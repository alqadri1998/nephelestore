<?php
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application.
|
*/


Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {
    Route::get('/updatecopmposer', function()
{
    //exec('composer dump-autoload');
    exec('composer update');
    echo 'composer update complete';
});
    // public admin Routes
	Route::get('login', 'AuthController@showLoginForm')->name('showLoginForm');
	Route::post('login', 'AuthController@login')->name('login');



    // protected admin routes
	Route::group(['middleware' => 'CheckAdmin:admin'], function () {

		Route::get('/', 'DashboardController@index')->name('dashboard');
		Route::get('logout', 'AuthController@logout')->name('logout');



		//Roles & Permissions Routes
		Route::resource('roles', 'RoleController');
		//Admins Routes
		Route::resource('admins', 'AdminController');
		Route::resource('carts', 'LeftCartController');
		
		//categories Routes
		Route::resource('categories', 'CategoryController');

		// product_sizes Routes
		Route::resource('product_colors', 'ProductColorController');
		Route::resource('product_sizes', 'ProductSizeController');
    	// products Routes
		Route::resource('products', 'ProductController');
		Route::get('reviews/products', 'ProductController@product_reviews')->name('reviews');
		 Route::get('/reviews/{id}/active', 'ProductController@reviews_active')->name('reviews_active');
		//pages
		Route::resource('pages', 'PageController');
		// slider
		Route::resource('sliders', 'SliderController');
		//Users Routes
		Route::resource('users', 'UserController');
		//subscriptions Routes
		Route::get('subscriptions', 'SubscriptionController@index')->name('subscriptions');
        Route::post('subscriptions/send', 'SubscriptionController@send')->name('subscriptions.send');
		//contact
		Route::resource('contacts', 'ContactController');
		Route::post('contact/sendReply', 'ContactController@sendReply')->name('contact.send');

		// coupons Routes
        Route::resource('coupons', 'CouponController');

        //orders
        // products Routes
        Route::resource('orders', 'OrderController');
        Route::get('order/status/{order_id}/{status}', 'OrderController@change_status')->name('order.change_status');


        /* Profile Route */
        Route::get('profile', 'AdminController@profile')->name('profile');
        Route::post('profile', 'AdminController@profileUpdate')->name('profileUpdate');

        /* Backup Route */
        Route::get('backup','BackupController@index')->name('backup.index');
        Route::get('backup/store','BackupController@store')->name('backup.store');
        Route::get('backup/restore/{id}','BackupController@restore')->name('backup.restore');
        Route::delete('backup/delete/{id}','BackupController@delete')->name('backup.destroy');

        /* Settings Route */
        Route::get('/settings', 'AdminController@settings', ['middleware' => 'permission:settings'])->name('settings');
        Route::post('/settings', 'AdminController@changeSetting', ['middleware' => 'permission:settings'])->name('changeSetting');
        Route::get('media/delete/{id}', 'MediaController@deleteMedia')->name('deleteMedia');

	});
	Route::get('language/{locale}', 'HomeController@changeLang')->name('changeLang');
});
