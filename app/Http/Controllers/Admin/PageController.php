<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Page;
class PageController extends Controller
{
   

    public function __construct()
    {
        $this->middleware('permission:list-pages', ['only' => ['index']]);
        $this->middleware('permission:create-pages', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-pages', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-pages', ['only' => ['destroy']]);
    }

    

    
    public function index(Request $request)
    {
        $items = Page::query();
        // dd("fff");

        parent::search($items, $request, ['name'], true);

        

        $items = $items->paginate(15);
        return view('admin.pages.pages.index',compact('items'));
    }

    public function create()
    {
        
        return view('admin.pages.pages.create');
    }

    
    public function store(Request $request)
    {
        try{
            $requestData = $request->all();
            
            $category = Page::createWithTranslations($requestData);
            
            $category->generateSlug();
            

            return redirect()->route('admin.pages.index')->with('message-success', __('admin.messages.Created Successfully'));
        }catch(\Exception $e){
            return redirect()->back()->with('message-error', $e->getMessage());
        }
    }

    public function show($id)
    {
        $item = Page::find($id);
        return view('admin.pages.pages.show',compact('item'));
    }

    
    public function edit($id)
    {
        $item = Page::find($id);
        return view('admin.pages.pages.edit',compact('item'));
    }

    
    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        // try{
            // dd($request->all());
            $item = Page::find($id);
            $item->updateWithTranslations($requestData);
            return redirect()->route('admin.pages.index')->with('message-success', __('admin.messages.updated Successfully'));
        // }catch(\Exception $e){
            // return redirect()->back()->with('message-error', $e->getMessage());
        // }
    }

   
    public function destroy($id)
    {
        try{
            Page::find($id)->delete();
            return redirect()->back()->with('message-success', __('admin.messages.removed Successfull'));
        }catch(\Exception $e){
            return redirect()->back()->with('message-error', $e->getMessage());
        }
    }
}
