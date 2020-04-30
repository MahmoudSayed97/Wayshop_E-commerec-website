<?php

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

Route::match(['get','post'],'/','IndexController@index');
Route::get('categories/{cat_id}','IndexController@categories');
Route::match(['get','post'],'/admin','adminController@login');
//route of register & login
Route::get('/login-register','UsersController@userLoginRegister');
//route of user register
Route::match(['get','post'],'/user-register','UsersController@register');
//route of user logout
Route::get('/user-logout','UsersController@logout');
//route of user login
Route::post('/user-login','UsersController@login');
//route for middleware after front login
Route::group(['middleware'=>['frontlogin']],function (){
    //route of user account
    Route::match(['get','post'],'/account','UsersController@account');
    Route::match(['get','post'],'/change-password','UsersController@changePassword');
    Route::match(['get','post'],'/change-address','UsersController@changeAddress');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout','adminController@logout');
Route::get('/products/{id}','productController@products');
Route::group(['middleware'=>['auth']],function(){
    // categories routes
    Route::match(['get','post'],'/admin/add-category','CategoryController@addCategory');
    Route::match(['get','post'],'/admin/viewcategories','CategoryController@viewCategory');
    Route::match(['get','post'],'/admin/edit-category/{id}','CategoryController@editCategory');
    Route::match(['get','post'],'//admin/delete-category/{id}','CategoryController@deleteCategory');
    Route::post('/admin/update-category-status','CategoryController@updateStatus');
    //product routes
    Route::match(['get','post'],'/admin/dashboard','adminController@dashboard');
    Route::match(['get','post'],'/admin/add-product','productController@addProduct');
    Route::match(['get','post'],'/admin/viewproduct','productController@viewProduct');
    Route::match(['get','post'],'/admin/edit-product/{id}','productController@editProduct');
    Route::match(['get','post'],'/admin/delete-product/{id}','productController@deleteProduct');
    Route::post('/admin/update-product-status','productController@updateStatus');
    Route::post('/admin/update-product-featured','productController@updateFeatured');
    Route::get('/update-price','productController@updatePrice');
    //routes of add to cart
    Route::match(['get','post'],'/add-cart','productController@addCart');
    Route::match(['get','post'],'/cart','productController@Cart');
    Route::match(['get','post'],'/cart/delete-product/{id}','productController@deleteCartProduct');
    //route of update product quantity
    Route::get('/cart/update-quantity/{id}/{quantity}','productController@updateQuantityCart');
    //routes ofproducts attributes
    Route::match(['get','post'],'/admin/add-attributes/{id}','productController@addAtrribute');
    Route::match(['get','post'],'/admin/edit-attributes/{id}','productController@editAttribut');
    Route::match(['get','post'],'/admin/delete-attributes/{id}','productController@deleteAtrribute');
    Route::match(['get','post'],'/admin/add-images/{id}','productController@addImages');
    Route::match(['get','post'],'/admin/delete-image/{id}','productController@deleteImage');
    //banners routes
    Route::match(['get','post'],'/admin/banners','bannersController@viewBanner');
    Route::match(['get','post'],'/admin/add-banner','bannersController@addBanner');
    Route::post('/admin/update-banner-status','bannersController@bannerStatus');
    Route::match(['get','post'],'/admin/edit-banner/{id}','bannersController@editBanner');
    Route::match(['get','post'],'/admin/delete-banner/{id}','bannersController@deleteBanner');
    //routes of Coupons
    Route::match(['get','post'],'/admin/add-coupons','CouponsController@addCoupon');
    Route::match(['get','post'],'/admin/viewcoupon','CouponsController@viewCoupon');
    Route::match(['get','post'],'/admin/delete-coupon/{id}','CouponsController@deleteCoupon');
    Route::match(['get','post'],'/admin/edit-coupon/{id}','CouponsController@editCoupon');
    Route::post('/admin/update-coupon-status','CouponsController@updateCouponStatus');
    //apply Coupon code

});
Route::match(['get','post'],'/cart/apply-coupon','productController@applyCoupon');


