<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\MediaHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductColorRequest;
use App\ProductColor;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductColorController extends Controller
{
    // public function __construct()
    // {

    // 	$this->middleware('permission:list-product_colors', ['only' => ['index']]);
    // 	$this->middleware('permission:create-product_colors', ['only' => ['create', 'store']]);
    // 	$this->middleware('permission:edit-product_colors', ['only' => ['edit', 'update']]);
    // 	$this->middleware('permission:delete-product_colors', ['only' => ['destroy']]);
    // }


    public function index(Request $request)
    {
        $items = ProductColor::query();

        parent::search($items, $request, ['name'], false);
        $items = $items->paginate(10);
        return view('admin.pages.product_colors.index', compact('items'));
    }

    public function create()
    {
        return view('admin.pages.product_colors.create');
    }


    public function store(ProductColorRequest $request)
    {
        try {
            $requestData = $request->all();

            $item = ProductColor::create($requestData);



            return redirect()->route('admin.product_colors.index')->with('message-success', __('admin.messages.Created Successfully'));
        } catch (\Exception $e) {
            return redirect()->back()->with('message-error', $e->getMessage());
        }
    }


    public function show($id)
    {
        $item = ProductColor::find($id);
        return view('admin.pages.product_colors.show', compact('item'));
    }

    public function edit($id)
    {
        $item = ProductColor::find($id);
        return view('admin.pages.product_colors.edit', compact('item'));
    }


    public function update(ProductColorRequest $request, $id)
    {
        $requestData = $request->all();
        try {
            $item = ProductColor::find($id);
            $item->update($requestData);
            return redirect()->route('admin.product_colors.index')->with('message-success', __('admin.messages.updated Successfully'));
        } catch (\Exception $e) {
            return redirect()->back()->with('message-error', $e->getMessage());
        }
    }


    public function destroy($id)
    {
        try {
            ProductColor::find($id)->delete();
            return redirect()->back()->with('message-success', __('admin.messages.removed Successfull'));
        } catch (\Exception $e) {
            return redirect()->back()->with('message-error', $e->getMessage());
        }
    }


}
