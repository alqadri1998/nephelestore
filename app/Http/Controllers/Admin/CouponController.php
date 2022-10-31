<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Coupon;
use App\CouponsHasCategory;
use App\CouponsHasProduct;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CouponRequest;
use App\Product;
use Illuminate\Http\Request;

class CouponController extends Controller {
	public function __construct() {

		$this->middleware('permission:list-coupons', ['only' => ['index']]);
		$this->middleware('permission:create-coupons', ['only' => ['create', 'store']]);
		$this->middleware('permission:edit-coupons', ['only' => ['edit', 'update']]);
		$this->middleware('permission:delete-coupons', ['only' => ['destroy']]);
	}

	public static function exportPdf($items) {
		$headers = ['coupon', 'value', 'orders_count'];
		$items = $items->withCount('orders')->get()
			->map(function ($row) {
				return [
					'coupon' => $row->coupon,
					'value' => $row->value,
					'orders_count' => $row->orders_count,
				];
			});
		return parent::export($headers, $items, 'coupons.index', 'coupons');
	}

	public function index(Request $request) {
		$items = Coupon::query();

		parent::search($items, $request, ['coupon', 'value']);

		if (isset($request['export'])) {
			return self::exportPdf($items);
		}

		$items = $items->with('products', 'categories')->paginate(10);
		return view('admin.pages.coupons.index', compact('items'));
	}

	public function create() {
		$categories = Category::where('active', 1)->get();
		$products = Product::where('active', 1)->whereNull('parent_id')->get();
		// dd($products->toArray());
		return view('admin.pages.coupons.create', compact('categories', 'products'));
	}

	public function store(CouponRequest $request) {

		try {
			$requestData = $request->all();
			$requestData['active'] = isset($requestData['active']) ? 1 : 0;
			$requestData['maximum_discount'] = $request['maximum_discount'] == null ? 0.00 : $request['maximum_discount'];
			// dd($requestData);
			// dd($request->all());
			if (isset($requestData['category_id']) && count($requestData['category_id']) > 0 && isset($requestData['product_id']) && count($requestData['product_id']) > 0) {
				return redirect()->back()->with('message-error', 'لا يمكن ان يعمل الكوبون على اقسام ومنتجات في نفس الوقت');
			}

			$item = Coupon::create($requestData);
			if (isset($requestData['category_id']) && count($requestData['category_id']) > 0) {
				foreach ($requestData['category_id'] as $category) {
					CouponsHasCategory::create([
						'coupon_id' => $item->id,
						'category_id' => $category,
					]);
				}

			}
			if (isset($requestData['product_id']) && count($requestData['product_id']) > 0) {

				foreach ($requestData['product_id'] as $product) {

					CouponsHasProduct::create([
						'coupon_id' => $item->id,
						'product_id' => $product,
					]);
				}

			}

			return redirect()->route('admin.coupons.index')->with('message-success', __('admin.messages.Created Successfully'));
		} catch (\Exception $e) {
			return redirect()->back()->with('message-error', $e->getMessage());
		}
	}

	public function show($id) {
		$item = Coupon::find($id);
		return view('admin.pages.coupons.show', compact('item'));
	}

	public function edit($id) {
		$item = Coupon::find($id);
		$categories = Category::where('active', 1)->get();
		$products = Product::where('active', 1)->whereNull('parent_id')->get();
		return view('admin.pages.coupons.edit', compact('item', 'categories', 'products'));
	}

	public function update(CouponRequest $request, $id) {
		$requestData = $request->all();
		// dd($requestData);
		try {
			$item = Coupon::find($id);
			$requestData['active'] = isset($requestData['active']) ? 1 : 0;
			$requestData['maximum_discount'] = $request['maximum_discount'] == null ? 0.00 : $request['maximum_discount'];
			if (isset($requestData['category_id']) && count($requestData['category_id']) > 0 && isset($requestData['product_id']) && count($requestData['product_id']) > 0) {
				return redirect()->back()->with('message-error', 'لا يمكن ان يعمل الكوبون على اقسام ومنتجات في نفس الوقت');
			}
			if ($item->categories()->count() > 0) {
				// dd();
				CouponsHasCategory::where('coupon_id', $item->id)->whereIn('category_id', $item->categories()->pluck('categories.id')->toArray())->delete();
				// $item->categories()->delete();
			}
			if ($item->products()->count() > 0) {
				CouponsHasProduct::where('coupon_id', $item->id)->whereIn('product_id', $item->products()->pluck('products.id')->toArray())->delete();
			}
			$item->update($requestData);
			if (isset($requestData['category_id']) && count($requestData['category_id']) > 0) {
				foreach ($requestData['category_id'] as $category) {
					CouponsHasCategory::create([
						'coupon_id' => $item->id,
						'category_id' => $category,
					]);
				}

			}
			if (isset($requestData['product_id']) && count($requestData['product_id']) > 0) {

				foreach ($requestData['product_id'] as $product) {

					CouponsHasProduct::create([
						'coupon_id' => $item->id,
						'product_id' => $product,
					]);
				}

			}
			return redirect()->route('admin.coupons.index')->with('message-success', __('admin.messages.updated Successfully'));
		} catch (\Exception $e) {
			return redirect()->back()->with('message-error', $e->getMessage());
		}
	}

	public function destroy($id) {
		try {
			$item = Coupon::find($id);
			//Check if copon has Orders
			$item->delete();
			return redirect()->back()->with('message-success', __('admin.messages.removed Successfull'));
		} catch (\Exception $e) {
			return redirect()->back()->with('message-error', $e->getMessage());
		}
	}
}
