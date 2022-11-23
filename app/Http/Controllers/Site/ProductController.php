<?php

namespace App\Http\Controllers\Site;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductReview;
use Auth;
use Illuminate\Http\Request;

class ProductController extends Controller {

	public function show($slug) {
		   $product = Product::whereSlug($slug)
			->with('media')
			->with(['category','pag'])
			->firstOrFail();
		// ->with('reviews')
        //  $item = Product::where('pag_id',$product->id)->get();
        if($product->is_pag ){
             $related =$product->pag ;
			$status = 'package';

        }else{
             $related = Product::where('active', 1)
            ->where(function ($query) use ($product) {
                        $query->where('category_id',$product->category_id)
                        ;

            })->take(24)->get();
			$status = 'related';


        }



		// $product = parent::mapProductData($product, true);

		return view('site.product', compact('product','related','status'));
	}

	public function quick_view(Request $request) {
		if (isset($request->slug)) {
			$product = Product::whereNull('parent_id')->whereSlug($request->slug)->where('active', true)->where('pag_id',0)
				->with('media')
				->with('category')
				->with('reviews')
				->firstOrFail();

			return view('site.quickview', compact('product'));
		} else {
			return false;
		}
	}

	public function getVariants($product_id) {

		//check that
		$variants = [];
		$product = Product::whereId($product_id)->with('variants.color')->first();
		foreach ($product->variants as $variant) {
			if ($variant['color'] && $variant['stock'] > 0) {
				$variants['color'][] = [
					'id' => $variant->id,
					'color' => $variant['color'] ? $variant['color']['name'] : '',
					'price' => $variant['special_price'] && ($variant['special_price'] > 0) ? intval($variant['special_price']) : intval($variant['price']),
					// 'price' => intval($variant['price']),
				];
			}
		}
		return ResponseHelper::sendResponse($variants, 200, __(''), false, []);
	}

	public function addReview(Request $request, $productId) {
		$product = Product::where('id', $productId)->first();
		if (Auth::user()) {
			$requestData = $request->except('_token');
			$requestData['rating'] = isset($requestData['rating']) ? $requestData['rating'] : 0;

			$requestData['product_id'] = $product->id;
			$requestData['user_id'] = Auth::id();
			ProductReview::create($requestData);
			return redirect()->back()->with('message-success', t('Your comment has been added successfully'));
		}
		return redirect()->back();

	}
}
