<?php

namespace App\Http\Controllers\Site;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\SliderItem;
use App\Subscription;
use Config;
use Illuminate\Http\Request;
use Session;

class HomeController extends Controller {
	public function index(Request $request) {
		$newProducts = Product::whereNull('parent_id')->where('active', 1)->where('featured', 1)->get();
		$categories = Category::where('active', 1)->whereNull('parent_id')->with('products')->orderBy('id', 'DESC')->get();
		$sales = Product::whereNull('parent_id')->where('active', 1)->where('new', true)->get();
		$homeSlider = SliderItem::where('active', 1)->get();
		return view('site.home', compact('newProducts', 'categories', 'sales', 'homeSlider'));
	}

	public function changeLang($locale) {
		app()->setLocale($locale);
		Config::set('app.locale', $locale);
		Session::put('locale', $locale);
		return redirect()->back();
	}

	public function dashboard() {
		return view('site.user.user-account');
	}

	public function addSubscription(Request $request) {

		Subscription::create($request->all());
		return redirect()->back()->with('message-success', t('You have successfully subscribed to the newsletter'));

	}

}