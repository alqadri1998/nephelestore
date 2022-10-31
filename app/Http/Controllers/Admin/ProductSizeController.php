<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\MediaHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductSizeRequest;
use App\ProductSize;
use Auth;
use Illuminate\Http\Request;

class ProductSizeController extends Controller
{
	// public function __construct()
	// {
		
	// 	$this->middleware('permission:list-product_sizes', ['only' => ['index']]);
	// 	$this->middleware('permission:create-product_sizes', ['only' => ['create', 'store']]);
	// 	$this->middleware('permission:edit-product_sizes', ['only' => ['edit', 'update']]);
	// 	$this->middleware('permission:delete-product_sizes', ['only' => ['destroy']]);
	// }

	
	public function index(Request $request)
	{
		// dd('adsdaf');
		$items = ProductSize::query();

		parent::search($items, $request, ['name'], false);
		$items = $items->paginate(10);
		return view('admin.pages.product_sizes.index',compact('items'));
	}

	public function create()
	{
		return view('admin.pages.product_sizes.create');
	}

	
	public function store(ProductSizeRequest $request)
	{
		try{
			$requestData = $request->all();
			$item = ProductSize::create($requestData);
			return redirect()->route('admin.product_sizes.index')->with('message-success', __('admin.messages.Created Successfully'));
		}catch(\Exception $e){
			return redirect()->back()->with('message-error', $e->getMessage());
		}
	}

	
	public function show($id)
	{
		$item = ProductSize::find($id);
		return view('admin.pages.product_sizes.show',compact('item'));
	}

	public function edit($id)
	{
		$item = ProductSize::find($id);
		return view('admin.pages.product_sizes.edit',compact('item'));
	}

	
	public function update(ProductSizeRequest $request, $id)
	{
		$requestData = $request->all();
		
        // try{
		$item = ProductSize::find($id);
		$item->update($requestData);
		return redirect()->route('admin.product_sizes.index')->with('message-success', __('admin.messages.updated Successfully'));
        // }catch(\Exception $e){
            // return redirect()->back()->with('message-error', $e->getMessage());
        // }
	}

	
	public function destroy($id)
	{
		try{
			ProductSize::find($id)->delete();
			return redirect()->back()->with('message-success', __('admin.messages.removed Successfull'));
		}catch(\Exception $e){
			return redirect()->back()->with('message-error', $e->getMessage());
		}
	}
}
