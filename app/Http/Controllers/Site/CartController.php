<?php

namespace App\Http\Controllers\Site;

use App\Cart;
use App\CartStorage;
use App\Coupon;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Product;
use App\Setting;
use Auth;
use Illuminate\Http\Request;

class CartController extends Controller {
	public static function cartPage(Request $request, $return = 'view') {
		$cartID = null;
		if (Auth::user() && $cartRow = CartStorage::where('user_id', Auth::id())->first()) {
			$cartID = str_replace('SAR_', '', $cartRow->session_key);
		} elseif (isset($request['cartID'])) {
			$cartID = $request['cartID'];
		} elseif ($request->cookie('cartID')) {
			$cartID = $request->cookie('cartID');
		}

		$items = Cart::find($cartID)->getContent();
		// dd($items);
		$subTotal = Cart::find($cartID)->getTotalPrice();
		$totalQuantity = Cart::find($cartID)->getTotalQuantity();
		$discount = 0;
		if (isset($request['coupon_code'])) {
			$coupon = self::checkCouponCode($request['coupon_code'], $subTotal);
			if ($coupon['valid']) {
				$discount = $coupon['amount'];
			}
		}

		if ($return == 'items') {
			return [
				'cartItems' => $items,
				'subTotal' => $subTotal,
				'totalQuantity' => $totalQuantity,
			];
		} else if ($return == 'json') {
			return ResponseHelper::sendResponse([
				'cartItems' => $items,
				'subTotal' => $subTotal,
				'totalQuantity' => $totalQuantity,
			], 200, null, false, []);
		}
		$shipping = 0;
		if ($discount > 0) {
			$request->session()->flash('message-success', 'Great! you got a good discount');
		}
		return view('site.pages.cart', compact('items', 'subTotal', 'totalQuantity', 'cartID', 'discount', 'shipping'));
	}
	public function myCart(Request $request) {
		// dd('ss');
		$cartID = null;
		if (Auth::user() && $cartRow = CartStorage::where('user_id', Auth::id())->first()) {
			$cartID = str_replace('SAR_', '', $cartRow->session_key);
		} elseif (isset($request['cartID'])) {
			$cartID = $request['cartID'];
		} elseif ($request->cookie('cartID')) {
			$cartID = $request->cookie('cartID');
		}
		// dd($cartID);
		$items = Cart::find($cartID)->getContent();
		// dd($items);
		$subTotal = Cart::find($cartID)->getTotalPrice();
		$totalQuantity = Cart::find($cartID)->getTotalQuantity();
		$discount = 0;
		if (isset($request['coupon_code'])) {
			$coupon = self::checkCouponCode($request['coupon_code'], $subTotal, $items);
			// dd($coupon);
			if ($coupon['valid']) {
				$checkCouponLimit = Coupon::where('coupon', $request['coupon_code'])->first();
				if ($checkCouponLimit->maximum_discount && $checkCouponLimit->maximum_discount > 0 && $coupon['amount'] > $checkCouponLimit->maximum_discount) {
					$discount = $checkCouponLimit->maximum_discount;
				} else {

					$discount = $coupon['amount'];
				}
			}
		}
		$shipping = 0;
		$vat = Setting::where('key', 'vat')->first()['value'] ?? 0;
		if ($discount > 0) {
			$request->session()->flash('message-success', t('Great! you got a good discount'));
		}
		return view('site.cart', compact('items', 'subTotal', 'totalQuantity', 'cartID', 'discount', 'shipping', 'vat'));
	}

	public function index(Request $request) {
		try {
			$cartID = null;
			if (isset($request['cartID'])) {
				$cartID = $request['cartID'];
			} elseif ($request->cookie('cartID')) {
				$cartID = $request->cookie('cartID');
			}
			$cartItems = Cart::find($cartID)->getContent();
			return ResponseHelper::sendResponse([
				'cartItems' => $cartItems,
				'subTotal' => Cart::find($cartID)->getTotalPrice(),
				'totalQuantity' => Cart::find($cartID)->getTotalQuantity(),
			], 200, null, false, []);
		} catch (\Exception $e) {
			return ResponseHelper::sendResponse([], 500, $e->getMessage(), true, []);
		}
	}

	public function addToCart(Request $request) {
		// try {
		if (isset($request->product_id)) {
			$response = new \Illuminate\Http\Response([]);
			$Product = Product::with('color', 'parent')->whereId($request->product_id)->first();
			// if (isset($request->quantity) && ($request->quantity > $Product->stock)) {
			// 	return $response;
			// }
			if ($Product) {
				$data = [];
				$rowId = $Product->id;
				$data['id'] = $Product->id;
				$data['price'] = $Product->special_price && ($Product->special_price > 0) ? $Product->special_price : $Product->price;
				$data['quantity'] = isset($request->quantity) ? $request->quantity : 1;
				// $data['size'] = isset($Product->size) ? $Product->size->size : null;
				$data['color'] = isset($Product->color) ? $Product->color->name : null;
				if (isset($request['cartID']) && $request['cartID'] && !empty($request['cartID'])) {
					$cartID = $request['cartID'];
				} else {
					if (Auth::user() && CartStorage::where('user_id', Auth::id())->first()) {
						$cartID = CartStorage::where('user_id', Auth::id())->first()['session_key'];
						$cartID = str_replace('SAR_', '', $cartID);
					} else if ($request->cookie('cartID')) {
						$cartID = $request->cookie('cartID');
					} else {
						$cartID = time() . rand(10, 10000);
						$response->withCookie(cookie('cartID', $cartID, 10080));
					}
				}
				$canAdd = true;
				$productsInCart = Cart::find($cartID)->getContentWithId();
				if (isset($productsInCart[$rowId])) {
					$availableStock = $Product->stock;
					$totalQuantity = $data['quantity'] + $productsInCart[$rowId]['quantity'];
					if ($totalQuantity > $availableStock) {
						$canAdd = false;
					}
				} else {
					$availableStock = $Product->stock;
					if ($data['quantity'] > $availableStock) {
						$canAdd = false;
					}
				}
				if ($canAdd) {
					Cart::find($cartID)->add([
						'id' => $data['id'],
						'name' => $Product->parent ? $Product->parent->name : $Product->name,
						'description' => $Product->parent ? $Product->parent->description : $Product->description,
						'color' => $data['color'],
						'price' => $data['price'],
						'quantity' => $data['quantity'],
						'thumb' => $Product->parent ? ($Product->parent->getFirstMedia('thumb') ? $Product->parent->getFirstMedia('thumb')->getFullUrl() : '') : ($Product->getFirstMedia('thumb') ? $Product->getFirstMedia('thumb')->getFullUrl() : ''),
						'attributes' => [
							// 'size' => $data['size'],
							'color' => $data['color'],
						],
					]);
				} else {
					$response->setContent([
						'status' => [
							'code' => 200,
							'message' => t('Cant exceed stock quantity', 'site'),
							'error' => true,
							'validation_errors' => [],
						],
						'data' => [
						],
					]);
					return $response;
				}
				$response->setContent([
					'status' => [
						'code' => 200,
						'message' => t('Added To Cart'),
						'error' => false,
						'validation_errors' => [],
					],
					'data' => [
						'cartItems' => Cart::find($cartID)->getContent(),
						'cartID' => $cartID,
					],
				]);
			} else {
				$response->setContent([
					'status' => [
						'code' => 200,
						'message' => 'wrong product_id',
						'error' => true,
						'validation_errors' => [],
					],
					'data' => [
					],
				]);
			}

		} else {
			$response->setContent([
				'status' => [
					'code' => 200,
					'message' => 'missing product_id',
					'error' => true,
					'validation_errors' => [],
				],
				'data' => [
				],
			]);
		}
		return $response;
		// } catch (\Exception $e) {
		// return ResponseHelper::sendResponse([], 500, $e->getMessage(), true, []);
		// }
	}

	public function addToCartWeb(Request $request) {
		// try {
		if (isset($request->product_id)) {
			$response = new \Illuminate\Http\Response([]);
			if (isset($request['size_id']) && isset($request['color_id'])) {
				$Product = Product::where('parent_id', $request->product_id)->where('size_id', $request['size_id'])->where('color_id', $request['color_id'])->with('size', 'color', 'parent')->first();
			} else if (isset($request['size_id'])) {
				$Product = Product::where('parent_id', $request->product_id)->where('size_id', $request['size_id'])->whereNull('color_id')->with('size', 'color', 'parent')->first();
			} else if (isset($request['color_id'])) {
				$Product = Product::where('parent_id', $request->product_id)->where('color_id', $request['color_id'])->whereNull('size_id')->with('size', 'color', 'parent')->first();
			} else {
				$Product = Product::with('size', 'color', 'parent')->whereId($request->product_id)->first();
			}
			if ($Product) {
				$data = [];
				$rowId = $Product->id;
				$data['id'] = $Product->id;
				$data['price'] = $Product->special_price ? $Product->special_price : $Product->price;
				$data['quantity'] = isset($request->quantity) ? $request->quantity : 1;
				$data['size'] = $Product->size ? $Product->size->size : null;
				$data['color'] = $Product->color ? $Product->color->name : null;
				if (isset($request['cartID']) && $request['cartID'] && !empty($request['cartID'])) {
					$cartID = $request['cartID'];
				} else {
					if (Auth::user() && CartStorage::where('user_id', Auth::id())->first()) {
						$cartID = CartStorage::where('user_id', Auth::id())->first()['session_key'];
						$cartID = str_replace('SAR_', '', $cartID);
					} else if (isset($request['cartID'])) {
						$cartID = $request['cartID'];
					} else {
						$cartID = time() . rand(10, 10000);
						// $response->withCookie(cookie('cartID', $cartID, 10080));
					}
				}
				$canAdd = true;
				$productsInCart = Cart::find($cartID)->getContentWithId();
				if (isset($productsInCart[$rowId])) {
					$availableStock = $Product->stock;
					$totalQuantity = $data['quantity'] + $productsInCart[$rowId]['quantity'];
					if ($totalQuantity > $availableStock) {
						$canAdd = false;
					}
				} else {
					$availableStock = $Product->stock;
					if ($data['quantity'] > $availableStock) {
						$canAdd = false;
					}
				}

				if ($canAdd) {
					Cart::find($cartID)->add([
						'id' => $data['id'],
						'name' => $Product->parent ? $Product->parent->name : $Product->name,
						'description' => $Product->parent ? $Product->parent->description : $Product->description,
						'color' => $data['color'],
						'price' => $data['price'],
						'quantity' => $data['quantity'],
						'thumb' => $Product->parent ? ($Product->parent->getFirstMedia('thumb') ? $Product->parent->getFirstMedia('thumb')->getFullUrl() : '') : ($Product->getFirstMedia('thumb') ? $Product->getFirstMedia('thumb')->getFullUrl() : ''),
						'attributes' => [
							'size' => $data['size'],
							'color' => $data['color'],
						],
					]);
					return redirect()->back()->with('message-success', __('trans.added_to_cart'))->withCookie(cookie('cartID', $cartID, 10080));
				} else {
					return redirect()->back()->with('message-error', __('trans.cant exceed stock quantity'));
				}
			} else {
				return redirect()->back()->with('message-error', __('wrong product_id'));
			}
		} else {
			return redirect()->back()->with('message-error', __('missing product_id'));
		}
		return redirect()->back()->with('message-success', __('trans.added_to_cart'));
		// } catch (\Exception $e) {
		// return ResponseHelper::sendResponse([], 500, $e->getMessage(), true, []);
		// }
	}

	public function removeFromCart(Request $request, $id) {
		try {

			// dd($request->all());
			if (Auth::user() && $cartStorage = CartStorage::where('user_id', Auth::id())->first()) {
				$cartID = $cartStorage['session_key'];
				$cartID = str_replace('SAR_', '', $cartID);
			} elseif (isset($request['cartID'])) {
				$cartID = $request['cartID'];
			} elseif ($request->cookie('cartID')) {
				$cartID = $request->cookie('cartID');
			}
			Cart::find($cartID)->remove($id);
			return redirect()->back()->with('message-success', t('Product Removed Successfully'));
		} catch (\Exception $e) {
			return redirect()->back()->with('message-error', $e->getMessage());
		}
	}
	public function clearCart(Request $request) {
		try {
			if (Auth::user() && $cartStorage = CartStorage::where('user_id', Auth::id())->first()) {
				$cartID = $cartStorage['session_key'];
				$cartID = str_replace('SAR_', '', $cartID);
			} elseif (isset($request['cartID'])) {
				$cartID = $request['cartID'];
			} elseif ($request->cookie('cartID')) {
				$cartID = $request->cookie('cartID');
			}
			Cart::find($cartID)->clear();
			return redirect()->back()->with('message-success', __('Cart Cleared Successfully'));
		} catch (\Exception $e) {
			return redirect()->back()->with('message-error', $e->getMessage());
		}
	}

	public function updateCart(Request $request) {
		// dd($request->all());
		try {
			if (isset($request['cartID'])) {
				$cartID = $request['cartID'];
				$canChange = true;
				if ($canChange) {
					// Cart::find($cartID)->clear();
					if (isset($request['cartItems'])) {
						foreach ($request['cartItems'] as $id => $quantity) {
							if ($quantity > 0) {
								$product = Product::find($id);
								// dd($product);
								if ($product && ($quantity > $product->stock)) {
									return redirect()->back()->with('message-error', t('Cant exceed stock quantity', 'site'));
								}

								Cart::find($cartID)->update($id, ['quantity' => $quantity], true);
							}

						}
					}
				} else {
					return redirect()->back()->with('message-error', __('can\'t exceed stock quantity'));
				}
				return redirect()->back()->with('message-success', t('Cart Updated Successfully', 'site'));
			} else {
				return redirect()->back()->with('message-error', __('missing cartId'));
			}
		} catch (\Exception $e) {
			return redirect()->back()->with('message-error', $e->getMessage());
		}
	}

	public function countCartItems(Request $request) {
		try {
			$count = 0;
			if (isset($request['cartID'])) {
				$cartID = $request['cartID'];
				$count = Cart::find($cartID)->getTotalQuantity();
			}
			return ResponseHelper::sendResponse(['count' => $count], 200, null, false, []);
		} catch (\Exception $e) {
			return ResponseHelper::sendResponse([], 500, $e->getMessage(), true, []);
		}
	}

	public static function checkCouponCode($coupon, $subTotal, $items) {
		$return = [
			'coupon' => $coupon,
			'valid' => false,
			'amount' => 0,
			'percentage' => 0,
			'coupon_id' => null,
		];

		$checkCoupon = Coupon::where('coupon', $coupon)->first();

		if ($checkCoupon) {
			if ($checkCoupon->categories()->count() > 0) {
				$categoriesIds = $checkCoupon->categories()->pluck('categories.id')->toArray();
				$couponAmout = 0;
				foreach ($items as $item) {
					$itemCaegory = Product::where('id', $item['product_id'])->first();
					if ($itemCaegory && in_array($itemCaegory->category_id, $categoriesIds)) {
						if ($checkCoupon->type == 'amount') {
							$couponAmout += $checkCoupon->value;
						} else if ($checkCoupon->type == 'percentage') {
							$percentageAmount = ($item['price'] * $checkCoupon->value) / 100;
							$couponAmout += $percentageAmount;
						}

					}
				}
				$return['coupon'] = $coupon;
				$return['valid'] = true;
				$return['coupon_id'] = $checkCoupon->id;
				$return['amount'] = $couponAmout;
				return $return;
			} else if ($checkCoupon->products()->count() > 0) {
				$productsIds = $checkCoupon->products()->pluck('products.id')->toArray();
				$couponAmout = 0;
				foreach ($items as $item) {
					if (in_array($item['product_id'], $productsIds)) {
						// dd('in');
						if ($checkCoupon->type == 'amount') {
							$couponAmout += $checkCoupon->value;
						} else if ($checkCoupon->type == 'percentage') {
							$percentageAmount = ($item['price'] * $checkCoupon->value) / 100;
							$couponAmout += $percentageAmount;
						}

					}

				} //foreach
				$return['valid'] = true;
				$return['coupon_id'] = $checkCoupon->id;
				// $return['amount'] = $checkCoupon->value;
				$return['amount'] = $couponAmout;
				return $return;
			} else {
				$return['valid'] = true;
				$return['coupon_id'] = $checkCoupon->id;
				$return['amount'] = $checkCoupon->type == 'amount' ? $checkCoupon->value : $subTotal * $checkCoupon->value / 100;
				//
				return $return;
			}
		} else {
			return $return;
		}

	}
}
