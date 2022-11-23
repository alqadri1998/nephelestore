<?php

use App\Http\Controllers\Site\Auth\LoginController;
use App\Http\Controllers\Site\CartController;
use App\Http\Controllers\Site\CheckOutController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\PageController;
use App\Http\Controllers\Site\ProductController;
use App\Http\Controllers\Site\ProfileController;
use App\Http\Controllers\Site\UserController;
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
Route::get('/logout', [LoginController::class,'logout'])->name('logout');
Route::get('/forgot/password', [LoginController::class,'forgotPassword'])->name('forgotPassword');
Route::post('/forgot/password', [LoginController::class,'confirmForgotPassword'])->name('confirmForgotPassword');
Route::get('/reset/password/{email}/{code}', [LoginController::class,'showResetPassword'])->name('show.reset-passwor');
Route::post('/reset/password', [LoginController::class,'resetPassword'])->name('reset-password');
Route::post('/subscription', [LoginController::class,'addSubscription'])->name('subscription');
Route::get('/contact', [PageController::class,'contact'])->name('contact');
Route::post('/contact', [PageController::class,'contact_send'])->name('contact.send');

Route::group(['middleware' => 'CheckUser:web'], function () {
	Route::get('/wishlist', [ProfileController::class,'wishlist'])->name('wishlist');
	Route::get('/checkout/payment/{orderId}', [CheckOutController::class,'payment'])->name('checkout.payment');
	Route::get('/checkout/thankyou/{orderId}', [CheckOutController::class,'thankyou'])->name('checkout.thankyou');

	Route::post('/product/{productId}/addReview', 'ProductController@addReview')->name('addReview');
	Route::group(['as' => 'user.', 'prefix' => 'user'], function () {
		Route::get('/dashboard', [HomeController::class,'dashboard'])->name('dashboard');
		Route::post('/dashboard', [UserController::class,'updateAccount'])->name('updateAccount');
		Route::get('/myOrders', [UserController::class,'myOrders'])->name('myOrders');

		/* Logout */
		// Route::get('/logout', 'UserAuthController@logout')->name('logout');
		Route::get('/logout', [\UserAuthController::class,'logout'])->name('logout');
	});
});

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/maintenance',[HomeController::class,'maintenance'])->name('maintenance');

//product
Route::get('/{slug}', 'ProductController@show')->name('product.show');

Route::get('/page/{slug}', 'PageController@page')->name('page');
Route::get('/shop/products', 'PageController@shop')->name('shop');
Route::get('language/{locale}', 'HomeController@changeLang')->name('changeLang');

/* Products */
Route::group(['as' => 'products.', 'prefix' => 'products'], function () {
	//Route::get('/', 'ProductController@index')->name('index');
	//Route::get('/{slug}', 'ProductController@show')->name('show');
	Route::get('/{product_id}/getVariants', [ProductController::class,'getVariants'])->name('getVariants');
	//Route::post('/review/submit/{id}', 'ProductController@submitReview')->name('submitReview');
});
/* Cart */
Route::get('/cart/{return?}', [CartController::class,'cartPage'])->name('cart');
Route::get('/mycart/show', [CartController::class,'myCart'])->name('myCart');
Route::post('/cart/addToCart', [CartController::class,'addToCart'])->name('addToCart');
Route::post('/cart/addToCart/web', [CartController::class,'addToCartWeb'])->name('addToCartWeb');

Route::post('/cart/update', [CartController::class,'updateCart'])->name('cart.update');

Route::get('/cart/{id}/removeFromCart', [CartController::class,'removeFromCart'])->name('removeFromCart');
Route::get('/cart/data/clear', [CartController::class,'clearCart'])->name('cart.clear');
/* Wish list */

// Route::get('/wishlist/print', 'ProfileController@printWishlist')->name('wishlist.print');
Route::get('/wishlist/{product_id}/add', [ProfileController::class,'addToWishlist'])->name('wishlist.add');
Route::get('/getLocations/{areaId}', [CheckOutController::class,'getAreas'])->name('getLocations');
Route::get('/wishlist/{product_id}/remove', [ProfileController::class,'removeFromWishlist'])->name('wishlist.remove');
/* Checkout */
Route::get('to/checkout', [CheckOutController::class,'index'])->name('checkout');
Route::post('/checkout', [CheckOutController::class,'checkout'])->name('checkout.post');
Route::post('/order/complete', [CheckOutController::class,'completeOrder'])->name('completeOrder');




