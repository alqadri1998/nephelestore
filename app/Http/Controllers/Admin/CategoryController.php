<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Helpers\MediaHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Category;
use Illuminate\Http\Request;
class CategoryController extends Controller
{
   

    public function __construct()
    {
        $this->middleware('permission:list-categories', ['only' => ['index']]);
        $this->middleware('permission:create-categories', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-categories', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-categories', ['only' => ['destroy']]);
    }

    public static function exportPdf($items)
    {
        $headers = ['ar_name', 'en_name', 'ar_discription', 'en_discription', 'products_count'];
        $items = $items->withCount('products')->get()
        ->map(function($row){
            return [
                'ar_name'             => $row->translate('ar')->name,
                'en_name'             => $row->translate('en')->name,
                'ar_discription'      => $row->translate('ar')->description,
                'en_discription'      => $row->translate('en')->description,
                'products_count'      => $row->products_count,
            ];
        });
        return parent::export($headers, $items, 'categories.index', 'categories');
    }

    
    public function index(Request $request)
    {
        $items = Category::query();
        // dd("fff");

        parent::search($items, $request, ['name'], true);

        if(isset($request['export'])){
            return self::exportPdf($items);
        }

        $items = $items->paginate(15);
        return view('admin.pages.categories.index',compact('items'));
    }

    public function create()
    {
        $categories = Category::where('active',1)->whereNull('parent_id')->get();
        return view('admin.pages.categories.create', compact('categories'));
    }

    
    public function store(CategoryRequest $request)
    {
        // try{
            $requestData = $request->all();
            // dd($requestData);
            $requestData['active'] = isset($requestData['active']) ? 1 : 0;
            
            $category = Category::createWithTranslations($requestData);
            
            $category->generateSlug();
            if (isset($requestData['image'])){
                $image = $request->file('image');
                $imageName = $category->slug.'-'.self::generateRandomName() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/category'),$imageName);
                $path = '/uploads/category/'.$imageName;
                $category->image = $path;
                $category->save();
              
            }
            if(isset($requestData['thumb']))
                MediaHelper::uploadMedia($category, $request, 'thumb', 'general', false, 'thumb');

            return redirect()->route('admin.categories.index')->with('message-success', __('admin.messages.Created Successfully'));
        // }catch(\Exception $e){
            // return redirect()->back()->with('message-error', $e->getMessage());
        // }
    }

    public function show($id)
    {
        $category = Category::find($id);
        return view('admin.pages.categories.show',compact('category'));
    }

    
    public function edit($id)
    {
        $item = Category::find($id);
        $categories = Category::where('id', '!=', $id)->where('active',1)->get();
        return view('admin.pages.categories.edit',compact('item','categories'));
    }

    
    public function update(CategoryRequest $request, $id)
    {
        $requestData = $request->all();
        try{
            $requestData['active'] = isset($requestData['active']) ? 1 : 0;
            $category = Category::find($id);
            $category->updateWithTranslations($requestData);
             if (isset($requestData['image'])){
                if($category->image){
                    @unlink(url($category->image));
                }
                $image = $request->file('image');
                $imageName = $category->slug.'-'.self::generateRandomName() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/category'),$imageName);
                $path = '/uploads/category/'.$imageName;
                $category->image = $path;
                $category->save();
              
            }
            
            if(isset($requestData['thumb']))
                MediaHelper::uploadMedia($category, $request, 'thumb', 'general', true, 'thumb', 500);
            return redirect()->route('admin.categories.index')->with('message-success', __('admin.messages.updated Successfully'));
        }catch(\Exception $e){
            return redirect()->back()->with('message-error', $e->getMessage());
        }
    }

   
    public function destroy($id)
    {
        try{
            Category::find($id)->delete();
            return redirect()->back()->with('message-success', __('admin.messages.removed Successfull'));
        }catch(\Exception $e){
            return redirect()->back()->with('message-error', $e->getMessage());
        }
    }
}
