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

Route::get('/', function () {
    return view('welcome');
});

Route::view('admin/admin','admin.admin');

Auth::routes();

Route::resource('Eshopper','FrontendController');

Route::get('login-register','FrontendController@userLoginRegister');

Route::match(['GET','POST'],'/check-email','FrontendController@checkEmail');

Route::post('user-register','FrontendController@register');

Route::post('user-login','FrontendController@login');

Route::get('user-logout','FrontendController@logout');

Route::get('/product/{url}','FrontendController@producturl');

Route::get('/productdetails/{id}','FrontendController@productid');

Route::match(['GET','POST'],'forgot-password','FrontendController@forgotPassword');

Route::post('/check-subscriber-email','FrontendController@checkSubscriber');

Route::post('/add-subscriber-email','FrontendController@addSubscriber');


Route::group(['middleware'=>['frontlogin']],function(){
	
	Route::match(['GET','POST'],'account','FrontendController@account');

	Route::match(['GET','POST'],'checkout','FrontendController@checkout');

	Route::match(['GET','POST'],'address','FrontendController@address');

	Route::match(['GET','POST'],'delete-address/{id}','FrontendController@deleteaddress');

	Route::get('/check-user-pwd','FrontendController@chkUserPassword');

	Route::post('update-user-pwd','FrontendController@updatePassword');

	Route::match(['GET','POST'],'add-cart','FrontendController@addtocart');

	Route::match(['GET','POST'],'cart','FrontendController@cart');

	Route::match(['GET','POST'],'/cart/update-quantity/{id}/{quantity}','FrontendController@updateCartQuantity');

	Route::match(['GET','POST'],'/cart/delete-product/{id}','FrontendController@deleteCartProduct');

	Route::match(['GET','POST'],'wishlist','FrontendController@wishtList');

	Route::match(['GET','POST'],'wishlist','FrontendController@wishtList');

	Route::match(['GET','POST'],'add-wishlist','FrontendController@addtoWishtList');

	Route::match(['GET','POST'],'/wishlist/add-to-cart/{id}','FrontendController@addWishlistProduct');

	Route::match(['GET','POST'],'/wishlist/delete-product/{id}','FrontendController@deleteWishlistProduct');

	Route::match(['GET','POST'],'order-review','FrontendController@orderReview');

	Route::match(['GET','POST'],'place-order','FrontendController@placeOrder');

	Route::match(['GET','POST'],'track-order/{id}','FrontendController@trackOrder');

	Route::get('thanks','FrontendController@thanks');

	Route::get('paypals','FrontendController@paypal');

	Route::get('orders','FrontendController@orders');

	Route::get('/orders/{id}','FrontendController@orderDetails');

	Route::get('paypal/thanks','FrontendController@paypalThanks');

	Route::get('paypal/cancel','FrontendController@paypalCancel');

	Route::get('paywithpaypal','PaymentController@index');

	Route::post('paypal','PaymentController@payWithPaypal');

	Route::get('status','PaymentController@getPaymentStatus');

});

Route::match(['GET','POST'],'contact-us','FrontendController@contactUs');

Route::match(['GET','POST'],'page/{title}','FrontendController@cmsPage');

Route::group(['middleware'=>['is_admin']],function(){

	Route::get('/home', 'HomeController@index')->name('home');
});



Route::post('/cart/apply-coupon','FrontendController@applyCoupon');

Route::resource('users','UserController');

Route::resource('banners','BannerController');

Route::resource('configurations','ConfigurationController');

Route::resource('categories','CategoryController');

Route::resource('products','ProductController');

Route::resource('attributes','ProductAttribute');

Route::resource('coupons','CouponController');

Route::get('view-newsletter','NewsletterController@viewNewsLetter');

Route::get('update-newsletter-status/{id}/{status}','NewsletterController@updateNewsLetter');

Route::get('delete-newsletter-email/{id}','NewsletterController@deleteNewsLetter');

Route::resource('cms','CmsController');

Route::resource('order','OrderController');

Route::match(['GET','POST'],'orderspage','OrderController@orderDetails');

Route::match(['GET','POST'],'customers','OrderController@customerDetails');

Route::get('/abc','Frontend\HomeController@DisplayImage');


Route::get('/getattributevalue/{id}',array('uses'=>'ProductController@myformAjax'));

