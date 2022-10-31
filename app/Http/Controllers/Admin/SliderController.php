<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SliderItem;
use App\Category;
class SliderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider_items = SliderItem::paginate(10);
        
        return view('admin.pages.slider_items.index', compact('slider_items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('active', true)->get();
        return view('admin.pages.slider_items.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->except('_token');
        try {
            if (isset($requestData['active'])) {
                $requestData['active'] = 1;
            } else {
                $requestData['active'] = 0;
            }
            if(isset($requestData['category_id']) && !empty($requestData['category_id'])){
                $catName = Category::where('id',$requestData['category_id'])->first();
                if($catName){
                    $requestData['url'] = 'shop/products?category='.$catName->slug;
                }
            }
            if (isset($requestData['image'])){
                $image = $request->file('image');
                $imageName = self::generateRandomName() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/slider'),$imageName);
                $requestData['path'] = '/uploads/slider/'.$imageName;
            }
            $slider_item = SliderItem::create($requestData);
            return redirect()->route('admin.sliders.index')->with('message-success', __('admin.messages.Created Successfully'));
        } catch (\Exception $e) {
            return redirect()->back()->with('message-error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($slider_item)
    {
        $slider_item = SliderItem::find($slider_item);
        return view('admin.pages.slider_items.show', compact('slider_item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($slider_item)
    {
        $slider_item = SliderItem::find($slider_item);
        $categories = Category::where('active', true)->get();
        return view('admin.pages.slider_items.edit', compact('slider_item','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slider_item)
    {
        $requestData = $request->except('_token');
        try {
            if (isset($requestData['active'])) {
                $requestData['active'] = 1;
            } else {
                $requestData['active'] = 0;
            }
            if(isset($requestData['category_id']) && !empty($requestData['category_id'])){
                $catName = Category::where('id',$requestData['category_id'])->first();
                if($catName){
                    $requestData['url'] = 'shop/products?category='.$catName->slug;
                }
            }
            $slider_item = SliderItem::find($slider_item);
            if (isset($requestData['image'])){
                // update old image with the new one
                @unlink(url($slider_item->path));
                $image = $request->file('image');
                $imageName = self::generateRandomName() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/slider'),$imageName);
                $requestData['path'] = '/uploads/slider/'.$imageName;
            }
            $slider_item->update($requestData);
            return redirect()->route('admin.sliders.index')->with('message-success', __('admin.messages.updated Successfully'));
        } catch (\Exception $e) {
            return redirect()->back()->with('message-error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($slider_item)
    {
        try {
            SliderItem::find($slider_item)->delete();
            return redirect()->back()->with('message-success', __('admin.messages.removed Successfully'));
        } catch (\Exception $e) {
            return redirect()->back()->with('message-error', $e->getMessage());
        }
    }

    
}
