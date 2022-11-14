<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
//User Auth Routes
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');

    return '<h1>Clear Config cleared</h1>';
});
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/forgot/password', 'Auth\LoginController@forgotPassword')->name('forgotPassword');
Route::post('/forgot/password', 'Auth\LoginController@confirmForgotPassword')->name('confirmForgotPassword');
Route::get('/reset/password/{email}/{code}', 'Auth\LoginController@showResetPassword')->name('show.reset-passwor');
Route::post('/reset/password', 'Auth\LoginController@resetPassword')->name('reset-password');
Route::post('/subscription', 'HomeController@addSubscription')->name('subscription');
Route::get('/contact', 'PageController@contact')->name('contact');
Route::post('/contact', 'PageController@contact_send')->name('contact.send');

Route::group(['middleware' => 'CheckUser:web'], function () {
	Route::get('/wishlist', 'ProfileController@wishlist')->name('wishlist');
	Route::get('/checkout/payment/{orderId}', 'CheckOutController@payment')->name('checkout.payment');
	Route::get('/checkout/thankyou/{orderId}', 'CheckOutController@thankyou')->name('checkout.thankyou');

	Route::post('/product/{productId}/addReview', 'ProductController@addReview')->name('addReview');
	Route::group(['as' => 'user.', 'prefix' => 'user'], function () {
		Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
		Route::post('/dashboard', 'UserController@updateAccount')->name('updateAccount');
		Route::get('/myOrders', 'UserController@myOrders')->name('myOrders');

		/* Logout */
		Route::get('/logout', 'UserAuthController@logout')->name('logout');
	});
});

Route::get('/', 'HomeController@index')->name('home');
//product
Route::get('/{slug}', 'ProductController@show')->name('product.show');

Route::get('/page/{slug}', 'PageController@page')->name('page');
Route::get('/shop/products', 'PageController@shop')->name('shop');
Route::get('language/{locale}', 'HomeController@changeLang')->name('changeLang');

/* Products */
Route::group(['as' => 'products.', 'prefix' => 'products'], function () {
	//Route::get('/', 'ProductController@index')->name('index');
	//Route::get('/{slug}', 'ProductController@show')->name('show');
	Route::get('/{product_id}/getVariants', 'ProductController@getVariants')->name('getVariants');
	//Route::post('/review/submit/{id}', 'ProductController@submitReview')->name('submitReview');
});
/* Cart */
Route::get('/cart/{return?}', 'CartController@cartPage')->name('cart');
Route::get('/mycart/show', 'CartController@myCart')->name('myCart');
Route::post('/cart/addToCart', 'CartController@addToCart')->name('addToCart');
Route::post('/cart/addToCart/web', 'CartController@addToCartWeb')->name('addToCartWeb');

Route::post('/cart/update', 'CartController@updateCart')->name('cart.update');

Route::get('/cart/{id}/removeFromCart', 'CartController@removeFromCart')->name('removeFromCart');
Route::get('/cart/data/clear', 'CartController@clearCart')->name('cart.clear');
/* Wish list */

// Route::get('/wishlist/print', 'ProfileController@printWishlist')->name('wishlist.print');
Route::get('/wishlist/{product_id}/add', 'ProfileController@addToWishlist')->name('wishlist.add');
Route::get('/getLocations/{areaId}', 'CheckOutController@getAreas')->name('getLocations');
Route::get('/wishlist/{product_id}/remove', 'ProfileController@removeFromWishlist')->name('wishlist.remove');
/* Checkout */
Route::get('to/checkout', 'CheckOutController@index')->name('checkout');
Route::post('/checkout', 'CheckOutController@checkout')->name('checkout.post');
Route::post('/order/complete', 'CheckOutController@completeOrder')->name('completeOrder');
