<?php

namespace App\Http\Controllers\Site;

use App\Cart;
use App\CartStorage;
use App\City;
use App\Coupon;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderHasProduct;
use App\Payment;
use App\Product;
use App\Setting;
use App\User;
use Auth;
use Illuminate\Http\Request;

class CheckOutController extends Controller {
	public function index(Request $request) {

		$cartID = null;
		$coupon = [
			'coupon' => isset($request['check_coupon_code']) ? $request['check_coupon_code'] : null,
			'valid' => false,
			'amount' => 0,
			'percentage' => 0,
		];
		if (Auth::user() && $cartRow = CartStorage::where('user_id', Auth::id())->first()) {
			$cartID = str_replace('SAR_', '', $cartRow->session_key);
		} elseif (isset($request['cartID'])) {
			$cartID = $request['cartID'];
		} elseif ($request->cookie('cartID')) {
			$cartID = $request->cookie('cartID');
		}
		$cartItems = Cart::find($cartID)->getContent();
		$subTotal = Cart::find($cartID)->getTotalPrice();
		$totalQuantity = Cart::find($cartID)->getTotalQuantity();

		$discount = 0;
		if (isset($request['coupon_code'])) {
			$coupon = $this->checkCouponCode($request['coupon_code'], $subTotal, $cartItems);
			if ($coupon['valid']) {
				$discount = $coupon['amount'];
			}
		}
		$authUser = Auth::user();
		$settings = Setting::pluck('value', 'key')->toArray();
		$shipping = 0;
		if (intval($subTotal) == 0) {
			return redirect()->back();
		}

		if ($discount > 0) {
			$request->session()->flash('message-success', t('Great! you got a good discount'));
		}

		$areas = City::whereNull('parent_id')->get();
		$vat = Setting::where('key', 'vat')->first()['value'] ?? 0;

		$shipping = $this->getShippingPrice($subTotal);

		// dd($areas);

		return view('site.checkout', compact('cartItems', 'subTotal', 'totalQuantity', 'cartID', 'authUser', 'coupon', 'settings', 'shipping', 'discount', 'areas', 'vat'));
	}

	public function getAreas($areaId) {
		$cites = City::where('parent_id', $areaId)->get();
		return ResponseHelper::sendResponse($cites, 200, null, false, []);
	}

	// public function checkCouponCode($coupon, $subTotal)
	public function checkCouponCode($coupon, $subTotal, $items) {
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
					// $product = Product::where('id',$item['product_id'])->first();
					if (in_array($item['product_id'], $productsIds)) {
						if ($checkCoupon->type == 'amount') {
							$couponAmout += $checkCoupon->value;
						} else if ($checkCoupon->type == 'percentage') {
							$percentageAmount = ($item['price'] * $checkCoupon->value) / 100;
							$couponAmout += $percentageAmount;
						}

					}
				}
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

	public function checkout(Request $request) {
		$authUser = null;
		if (Auth::user()) {
			$authUser = Auth::user();
		} else {
			$this->createUser($request->all);
		}
		$cartID = null;
		if (Auth::user() && $cartRow = CartStorage::where('user_id', Auth::id())->first()) {
			$cartID = str_replace('USR_', '', $cartRow->session_key);
		} elseif (isset($request['cartID'])) {
			$cartID = $request['cartID'];
		} elseif ($request->cookie('cartID')) {
			$cartID = $request->cookie('cartID');
		}
		$cartItems = Cart::find($cartID)->getContent();
		$subTotal = Cart::find($cartID)->getTotalPrice();
		$totalQuantity = Cart::find($cartID)->getTotalQuantity();

		$coupon_code = null;
		$discount_percent = null;
		$discount_amount = null;
		$coupon_id = null;
		if (isset($request['coupon_code'])) {
			$discount = $this->checkCouponCode($request['coupon_code'], $subTotal, $cartItems);
			if ($discount['valid']) {

				$checkCouponLimit = Coupon::where('coupon', $request['coupon_code'])->first();
				if ($checkCouponLimit->maximum_discount && $checkCouponLimit->maximum_discount > 0 && $discount['amount'] > $checkCouponLimit->maximum_discount) {
					$subTotal = $subTotal - $checkCouponLimit->maximum_discount;
				} else {

					$subTotal = $subTotal - $coupon['amount'];
				}

				$discount_percent = $discount['percentage'];
				$discount_amount = $discount['amount'];
				$coupon_code = $request['coupon_code'];
				$coupon_id = $discount['coupon_id'];
				// $subTotal = $subTotal - $discount['amount'];
			}

		}

		/* Handle Shipping Fees */
		$shipping = 0;
		$subTotal = $subTotal + $shipping;

		$addressData = [];
		if (isset($request['address_id']) && !empty($request['address_id'])) {
			$selectedAddress = UserAddress::whereId($request['address_id'])->with('state.parent')->first();
			$addressData = [
				'contact_name' => $selectedAddress->contact_name,
				'contact_mobile' => $selectedAddress->contact_mobile,
				'country_code' => $selectedAddress->country_code,
				'street_address_line1' => $selectedAddress->street_address_line1,
				'street_address_line2' => $selectedAddress->street_address_line2,
				'city_department' => $selectedAddress->city_department,
				'zip_code' => $selectedAddress->zip_code,
				'state_id' => $selectedAddress->state_id,
				'address_id' => $selectedAddress->id,
				'card_holder_name' => $selectedAddress->card_holder_name,
				'card_number' => $selectedAddress->card_number,
				'card_expiration_month' => $selectedAddress->card_expiration_month,
				'card_expiration_year' => $selectedAddress->card_expiration_year,
				'card_security_code' => $selectedAddress->card_security_code,
			];
			$request['card_holder_name'] = $selectedAddress->card_holder_name;
			$request['card_number'] = $selectedAddress->card_number;
			$request['card_expiration_month'] = $selectedAddress->card_expiration_month;
			$request['card_expiration_year'] = $selectedAddress->card_expiration_year;
			$request['card_security_code'] = $selectedAddress->card_security_code;
		} else {
			$addressData = [
				'contact_name' => $request['contact_name'],
				'contact_mobile' => $request['contact_mobile'],
				'country_code' => $request['country_code'],
				'street_address_line1' => $request['street_address_line1'],
				'street_address_line2' => $request['street_address_line2'],
				'city_department' => $request['city_department'],
				'zip_code' => isset($request['zip_code']) ? $request['zip_code'] : null,
				'state_id' => $request['state_id'],
				'default' => isset($request['default_address']),

				'card_holder_name' => $request['card_holder_name'],
				'card_number' => $request['card_number'],
				'card_expiration_month' => $request['card_expiration_month'],
				'card_expiration_year' => $request['card_expiration_year'],
				'card_security_code' => $request['card_security_code'],
			];
			if (isset($request['default_address'])) {
				Auth::user()->addresses()->update(['default' => false]);
			}
			if (isset($request['add_to_profile'])) {
				Auth::user()->addresses()->create($addressData);
			}
			unset($addressData['default']);
		}

		// create order
		$orderData = [
			'status' => Order::$PENDING,
			'coupon_code' => $coupon_code,
			'total_item_count' => $totalQuantity,
			'sub_total' => $subTotal,
			'discount_percent' => $discount_percent,
			'discount_amount' => $discount_amount,
			'shipping_price' => $this->getShippingPrice($subTotal),
			'customer_id' => $authUser->id,
			'address_id' => isset($request['address_id']) ? $request['address_id'] : null,
			'coupon_id' => $coupon_id,
			'payment_method' => 'credit',
		];

		$orderData = array_merge($orderData, $addressData);

		$createdOrder = Order::create($orderData);
		$createdOrder->createOrderID();

		// set order products
		foreach ($cartItems as $item) {
			OrderHasProduct::create([
				'product_id' => $item['product_id'],
				'order_id' => $createdOrder->id,
				'quantity' => $item['quantity'],
				'price' => $item['price'],
				'size' => isset($item['attributes']['size']) ? $item['attributes']['size'] : null,
				'color' => isset($item['attributes']['color']) ? $item['attributes']['color'] : null,
			]);
		}

		// process payment
		$authorizePayment = new AuthorizeNetPayment;
		$authorizePayment->initiate();
		$response = $authorizePayment->create_charge($request, $createdOrder);
		// dd($response);
		if ($response['success']) {
			// payment success
			// update order status
			$createdOrder->status = Order::$PAID;
			$createdOrder->save();

			foreach ($cartItems as $item) {
				$prod = Product::whereId($item['product_id'])->first();
				if ($prod) {
					$prod->reduceQuantityBy($item['quantity']);
				}
			}
			// clear cart
			Cart::find($cartID)->clear();

			// add item to shipping company feddix
			// redirect to thankyou
			return redirect()->route('checkout.thankyou', $createdOrder->id);
		} else {
			// delete order
			@$createdOrder->delete();
			return redirect()->back()->withInput($request->all())->with('message-error', $response['msg']);
		}

	}
	public function completeOrder(Request $request) {

		$authUser = null;
		if (Auth::user()) {
			$authUser = Auth::user();
		} else {
			$authUser = $this->createUser($request->all());
		}

		$cartID = null;
		if (Auth::user() && $cartRow = CartStorage::where('user_id', Auth::id())->first()) {
			$cartID = str_replace('SAR_', '', $cartRow->session_key);
		} elseif (isset($request['cartID'])) {
			$cartID = $request['cartID'];
		} elseif ($request->cookie('cartID')) {
			$cartID = $request->cookie('cartID');
		}

		$cartItems = Cart::find($cartID)->getContent();
		$subTotal = Cart::find($cartID)->getTotalPrice();
		$totalQuantity = Cart::find($cartID)->getTotalQuantity();
		$vat = Setting::where('key', 'vat')->first()['value'] ?? 0;
		$coupon_code = null;
		$coupon_id = null;
		$discount = null;
		$coupon_id = null;
		$vatAmount = ($subTotal * $vat / 100);
		$total = 0;
		if (isset($request['coupon'])) {
			$discount = $this->checkCouponCode($request['coupon'], $subTotal, $cartItems);

			if ($discount['valid']) {

				$checkCouponLimit = Coupon::where('coupon', $request['coupon'])->first();
				$coupon_id = $checkCouponLimit->id;
				if ($checkCouponLimit->maximum_discount && $checkCouponLimit->maximum_discount > 0 && $discount['amount'] > $checkCouponLimit->maximum_discount) {
					$total = $subTotal - $checkCouponLimit->maximum_discount;
				} else {

					$total = $subTotal - $checkCouponLimit['amount'];
				}

				// $discount_percent = $discount['percentage'];
				$discount = $discount['amount'];
				$coupon_code = $request['coupon_code'];
				$coupon_id = $checkCouponLimit ? $checkCouponLimit->id : null;
				// $subTotal = $subTotal - $discount['amount'];
			} else {
				$discount = 0;
				$coupon_code = null;
			}

		}

		/* Handle Shipping Fees */
		$shipping = 0;
		$total = ($subTotal + $vatAmount + $shipping) - $discount;

		// create order
		$orderData = [
			'status' => 'pending',
			'payment_method' => $request['payment_method'],
			'coupon_code' => $coupon_code,
			'coupon_id' => $coupon_id,
			'total_item_count' => $totalQuantity,
			'sub_total' => $subTotal,
			'vatAmount' => $vatAmount,
			'total' => $total,
			'discount' => $discount,
			'shipping_price' => $this->getShippingPrice($subTotal),
			'user_id' => $authUser->id,
			'name' => $request['name'],
			'mobile' => $request['mobile'],
			'area_id' => $request['area'],
			'city_id' => $request['city'],
			'street_address' => $request['street_address'],
			'payment_method' => $request['payment_method'],
		];
		$createdOrder = Order::create($orderData);
		$createdOrder->createOrderID();

		// set order products
		foreach ($cartItems as $item) {
			OrderHasProduct::create([
				'product_id' => $item['product_id'],
				'order_id' => $createdOrder->id,
				'quantity' => $item['quantity'],
				'price' => $item['price'],

			]);
		}
		// Update User Address
		$authUser->area_id = $request['area'];
		$authUser->city_id = $request['city'];
		$authUser->street_address = $request['street_address'];
		$authUser->save();

		// foreach ($cartItems as $item) {
		//         $prod = Product::whereId($item['product_id'])->first();
		//         if($prod){
		//             $prod->reduceQuantityBy($item['quantity']);
		//         }
		//     }
		if ($request['payment_method'] == 'credit') {

			return redirect()->route('checkout.payment', $createdOrder->id);
		} else {
			Cart::find($cartID)->clear();
			return redirect()->route('checkout.thankyou', $createdOrder->id);
		}

	}
	public function getShippingPrice($sub_total) {
		$shipping = 0;
		return $shipping;
	}

	// public function retryPayment($order_id)
	// {
	//     $createdOrder = Order::find($order_id);
	//     $tapPayment = new TapPayment;
	//     $tapPayment->initiate();
	//     @$createdOrder->payments()->delete();
	//     $createdPayment = $createdOrder->payments()->create([
	//         'currency'      => 'SAR',
	//         'amount'        => number_format($createdOrder->sub_total + $createdOrder->shipping_price, 2),
	//         'user_id'       => $createdOrder->user_id,
	//     ]);
	//     $createdCharge = $tapPayment->create_charge($createdOrder, $createdPayment);
	//     if(!$createdCharge['error']){
	//     // create payment ans save charge id
	//         $createdPayment->charge_id = $createdCharge['chargeId'];
	//         $createdPayment->save();
	//     // redirect
	//         return redirect()->to($createdCharge['redirectUrl']);
	//     }
	// }

	public function payment(Request $request, $orderId) {
		$order = Order::whereId($orderId)->with('products')->first();
		// dd($order->toArray());
		return view('site.payment', compact('order'));
	}
	public function thankyou(Request $request, $orderId) {
		$createdOrder = Order::whereId($orderId)->first();

		$paymentStatus = true;
		if (isset($request['id'])) {
			$payment_id = $request['id'];
			try {
				$payment = \Moyasar\Facades\Payment::fetch($payment_id);
			} catch (\Exception $e) {
				$payment = null;
			}

			if ($payment) {

				if ($payment->status === 'paid' && $payment->amount == ($createdOrder->total) * 100) {

					// Success payment
					$paymentStatus = true;
					$data['user_id'] = Auth::user()->id;
					$data['order_id'] = $orderId;
					$data['msg'] = $request['message'];
					$data['amount'] = $request['amount'] / 100;
					$data['transactionId'] = $request['id'];
					$data['status'] = $request['status'];
					Payment::create($data);
					$createdOrder->update(['status' => 'paid']);
				} else {
					$createdOrder->update(['paid' => 0]);
					$paymentStatus = false;
				}
			}
			$cartID = null;
			if (Auth::user() && $cartRow = CartStorage::where('user_id', Auth::id())->first()) {
				$cartID = str_replace('SAR_', '', $cartRow->session_key);
			} elseif (isset($request['cartID'])) {
				$cartID = $request['cartID'];
			} elseif ($request->cookie('cartID')) {
				$cartID = $request->cookie('cartID');
			}
			Cart::find($cartID)->clear();

		}

		return view('site.thankyou', compact('createdOrder', 'paymentStatus'));
	}

	public function createUser($request) {
		// dd($request);
		if ($checkUser = User::where('mobile', $request['mobile'])->first()) {
			Auth::login($checkUser);
			return $checkUser;
		}
		$data['name'] = $request['name'];
		$data['email'] = 'nephele' . rand(1, 9999999) . '@nephele.com';
		$data['password'] = bcrypt($request['mobile']);
		$data['mobile'] = $request['mobile'];
		// dd($data);
		$user = User::create($data);
		Auth::login($user);
		return $user;
	}
}
