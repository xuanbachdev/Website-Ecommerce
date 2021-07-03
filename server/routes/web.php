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

// Route::get('/', function () {
//     return view('welcome');
// });

// Front-end
Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'HomeController@index')->name('home');
Route::post('/tim-kiem', 'HomeController@search');

Route::get('/category/{slug}/{id}', [
    'as' => 'category.product',
    'uses' => 'CategoryController@index_frontend'
]);

Route::get('/chi-tiet-san-pham/{product_slug}', 'ProductController@details_product')->name('product-details');

// Cart
Route::post('/save-cart', 'CartController@save_cart')->name('save_cart');
Route::post('/update_cart_quantity', 'CartController@update_cart_quantity');
Route::post('/update-cart', 'CartController@update_cart');
//Route::get('/show-cart', 'CartController@show_cart');
Route::get('/show-cart', 'CartController@show_cart_menu');
Route::get('/gio-hang', 'CartController@gio_hang');
Route::get('/hover-cart', 'CartController@hover_cart');
Route::get('/delete-to-cart/{rowId}', 'CartController@delete_to_cart');

Route::get('/delete-product/{session_id}', 'CartController@delete_product');
Route::get('/del-all-product','CartController@delete_all_product');

Route::post('/add-cart-ajax', 'CartController@add_cart_ajax');


// Checkout
Route::post('/order-place', 'CheckoutController@order_place')->name('order-place');

// Coupon
Route::post('/check-coupon', 'CartController@check_coupon');
Route::get('/insert-coupon', 'CouponController@insert_coupon')->name('insert_coupon');
Route::get('/unset-coupon', 'CouponController@unset_coupon')->name('insert_coupon');
Route::get('/delete-coupon/{coupon_id}', 'CouponController@delete_coupon');
Route::get('/list-coupon', 'CouponController@list_coupon')->name('list_coupon');
Route::post('/insert-coupon-code', 'CouponController@insert_coupon_code')->name('insert-coupon-code');

//Payment
Route::get('/payment', 'CheckoutController@payment');

//Customer
Route::get('/profile', 'CustomerController@getProfile');
Route::get('/login', 'CustomerController@login_checkout');
Route::get('/logout', 'CustomerController@customer_logout');
Route::get('/register', 'CustomerController@customer_register');
Route::post('/add-customer', 'CustomerController@store');
Route::post('/login-customer', 'CustomerController@customer_login');
Route::get('/checkout', 'CustomerController@checkout');
Route::post('/save-checkout-customer', 'CustomerController@save_checkout_customer');


// Order
Route::get('/manage-order', 'OrderController@manage_order');
Route::get('/view-order/{order_code}', 'OrderController@view_order');
Route::post('/update-order-qty','OrderController@update_order_qty');


Route::post('/confirm-order', 'CheckoutController@confirm_order');



//// Profile
//Route::group(['prefix' => 'profile'], function () {
//    Route::get('', 'ProfileConTroller@getProfile')->name('admin.profile');
////
////    Route::post('sua/{id}', 'ProfileConTroller@postSua')->name('admin.profile.postSua');
////    Route::post('password/{id}', 'ProfileConTroller@postPassword')->name('admin.profile.postPassword');
//});



// Back-end
Route::get('/dashboard', 'AdminController@show_dashboard')->name('dashboard');

Route::prefix('admin')->group(function () {
    //Login

    Route::get('/', [
        'as' => 'admin.login',
        'uses' => 'AdminController@loginAdmin'
    ]);

    Route::post('/', [
        'as' => 'admin.post-login',
        'uses' => 'AdminController@postLoginAdmin'
    ]);

    Route::get('/logout', [
        'as' => 'admin.logout',
        'uses' => 'AdminController@logout'
    ]);

    // Category
    Route::prefix('categories')->group(function () {
        Route::get('/', [
            'as' => 'categories.index',
            'uses' => 'CategoryController@index',
            'middleware' => 'can:category-list'
        ]);

        Route::get('/create', [
            'as' => 'categories.create',
            'uses' => 'CategoryController@create',
            'middleware' => 'can:category-add'
        ]);

        Route::post('/store', [
            'as' => 'categories.store',
            'uses' => 'CategoryController@store'
        ]);

        Route::get('/edit/{category_id}', [
            'as' => 'categories.edit',
            'uses' => 'CategoryController@edit',
            'middleware' => 'can:category-edit'
        ]);

        Route::post('/update/{category_id}', [
            'as' => 'categories.update',
            'uses' => 'CategoryController@update'
        ]);

        Route::get('/delete/{category_id}', [
            'as' => 'categories.delete',
            'uses' => 'CategoryController@delete',
            'middleware' => 'can:category-delete'
        ]);

    });

    // Slider
    Route::prefix('slider')->group(function () {

        Route::get('/', [
            'as' => 'slider.index',
            'uses' => 'SliderController@index',
            'middleware' => 'can:slider-list'
        ]);

        Route::get('/create', [
            'as' => 'slider.create',
            'uses' => 'SliderController@create',
            'middleware' => 'can:slider-add'
        ]);

        Route::post('/store', [
            'as' => 'slider.store',
            'uses' => 'SliderController@store'
        ]);


        Route::get('/edit/{id}', [
            'as' => 'slider.edit',
            'uses' => 'SliderController@edit',
            'middleware' => 'can:slider-edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'slider.update',
            'uses' => 'SliderController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'slider.delete',
            'uses' => 'SliderController@delete',
            'middleware' => 'can:slider-delete'
        ]);

    });

    // Setting
    Route::prefix('settings')->group(function () {

        Route::get('/', [
            'as' => 'settings.index',
            'uses' => 'SettingController@index',
            'middleware' => 'can:setting-list'
        ]);

        Route::get('/create', [
            'as' => 'settings.create',
            'uses' => 'SettingController@create',
            'middleware' => 'can:setting-add'
        ]);

        Route::post('/store', [
            'as' => 'settings.store',
            'uses' => 'SettingController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'settings.edit',
            'uses' => 'SettingController@edit',
            'middleware' => 'can:setting-edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'settings.update',
            'uses' => 'SettingController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'settings.delete',
            'uses' => 'SettingController@delete',
            'middleware' => 'can:setting-delete'
        ]);

    });

    // User
    Route::prefix('users')->group(function () {

        Route::get('/', [
            'as' => 'users.index',
            'uses' => 'UserController@index',
            'middleware' => 'can:user-list'
        ]);

        Route::get('/create', [
            'as' => 'users.create',
            'uses' => 'UserController@create',
            'middleware' => 'can:user-add'
        ]);

        Route::post('/store', [
            'as' => 'users.store',
            'uses' => 'UserController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'users.edit',
            'uses' => 'UserController@edit',
            'middleware' => 'can:user-edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'users.update',
            'uses' => 'UserController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'users.delete',
            'uses' => 'UserController@delete',
            'middleware' => 'can:user-delete'
        ]);

    });

    // Role
    Route::prefix('roles')->group(function () {

        Route::get('/', [
            'as' => 'roles.index',
            'uses' => 'RoleController@index',
            'middleware' => 'can:role-list'
        ]);

        Route::get('/create', [
            'as' => 'roles.create',
            'uses' => 'RoleController@create',
            'middleware' => 'can:role-add'
        ]);

        Route::post('/store', [
            'as' => 'roles.store',
            'uses' => 'RoleController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'roles.edit',
            'uses' => 'RoleController@edit',
            'middleware' => 'can:role-edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'roles.update',
            'uses' => 'RoleController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'roles.delete',
            'uses' => 'RoleController@delete',
            'middleware' => 'can:role-delete'
        ]);


    });

    // Permission
    Route::prefix('permissions')->group(function () {
        Route::get('/create', [
            'as' => 'permissions.create',
            'uses' => 'PermissionController@createPermissions'
        ]);

        Route::post('/store', [
            'as' => 'permissions.store',
            'uses' => 'PermissionController@store'
        ]);


    });


});
