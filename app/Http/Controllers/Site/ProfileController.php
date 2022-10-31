<?php

namespace App\Http\Controllers\Site;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Wishlist;
use Auth;

class ProfileController extends Controller {

	// public function show()
	// {
	//     $authUser = User::with('default_address')->whereId(Auth::id())->first();
	//     return view('site.pages.profile', compact('authUser'));
	// }
	// public function password()
	// {
	//     return view('site.pages.profile-password');
	// }

	// public function address()
	// {
	//     $authUser = User::with('addresses')->whereId(Auth::id())->first();
	//     return view('site.pages.address', compact('authUser'));
	// }

	// public function update(ProfileUpdateRequest $request)
	// {
	//     // try{
	//     $requestData = $request->all();
	//     Auth::user()->update($requestData);
	//     return redirect()->back()->with('message-success', __('Account Information Updated Successfully'));
	//     // }catch(\Exception $e){
	//         // return redirect()->back()->with('message-error', $e->getMessage());
	//     // }
	// }

	// public function updatePassword(Request $request)
	// {
	//     // try{
	//     $this->validate($request, [
	//         'old_password' => 'required',
	//         'password' => 'required|confirmed',
	//     ]);
	//     $requestData = $request->all();
	//     if(Hash::check($requestData['old_password'], Auth::user()->password)){
	//         $requestData['password'] = bcrypt($requestData['password']);
	//         Auth::user()->update($requestData);
	//     }else{
	//         // invalid old password
	//         return redirect()->back()->with('message-error', __('Old password is not correct'));
	//     }
	//     return redirect()->back()->with('message-success', __('Password Updated Successfully'));
	//     // }catch(\Exception $e){
	//         // return redirect()->back()->with('message-error', $e->getMessage());
	//     // }
	// }

	public function wishlist() {
		$items = [];
		if (Auth::check()) {
			$items = Auth::user()->wishlist()->where('products.active', 1)->with('color')->get();
			// parent::mapProductData($items);
		}
		return view('site.wishlist', compact('items'));
	}

	public function addToWishlist($product_id) {
		if (Auth::guest()) {
			return ResponseHelper::sendResponse([], 200, t('Please login to add items to wishlist'), true, []);
		} elseif (Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->exists()) {
			@Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->delete();

			return ResponseHelper::sendResponse(['added' => false], 200, t('Product Removed From Wishlist Successfully'), false, []);
		} else {
			@Wishlist::create([
				'user_id' => Auth::id(),
				'product_id' => $product_id,
			]);
		}
		// return redirect()->back()->with('message-success', __('Product Added To Wishlist Successfully'));
		return ResponseHelper::sendResponse(['added' => true], 200, __('Product Added To Wishlist Successfully'), false, []);
	}

	public function removeFromWishlist($product_id) {
		@Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->delete();
		return ResponseHelper::sendResponse(['added' => false], 200, t('Product Removed From Wishlist Successfully'));
	}

	// public function orders_traking()
	// {
	//     $orders = Auth::user()->orders()->with('products')->orderBy('orders.id', 'DESC')->get();
	//     $orders = Order::where('customer_id', Auth::id())
	//                     ->with('products')
	//                     ->orderBy('orders.id', 'DESC')
	//                     ->get();
	//     return view('site.pages.tracking_orders', ['orders' => $orders]);
	// }

	// public function refundOrder(Request $request, $id)
	// {
	//     $order = Order::findOrFail($id);
	//     $authorizePayment = new AuthorizeNetPayment;
	//     $authorizePayment->initiate();
	//     $response = $authorizePayment->refund($order);
	//     if($response['success']){
	//         return redirect()->back()->with('message-success', __('Order Refunded Successfully'));
	//     }
	//     return redirect()->back()->with('message-error', __('Some thing went wrong please try again later'));
	// }

}
