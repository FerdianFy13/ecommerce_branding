<?php

use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Auth;
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

/* landing page */
Route::get('/','LandingPageController@index');

/* news page */
Route::get('/posts','PostController@posts');
Route::get('/post/{slug}','PostController@singlePost');

/* custom page */
Route::get('/page/{slug}','CustomPageController@index');

/* about page */
Route::get('/about','AboutPageController@index');

/* contact page */
Route::get('/contact','ContactPageController@index');
Route::post('/contact/post','ContactPageController@contact')->name('contact.post');

/*shop page */
Route::get('/shop','ShopPageController@index');
Route::get('/shop/search','ShopPageController@search')->name('shop.search');
Route::get('/shop/category','ShopPageController@category')->name('shop.category');

/*product page */
Route::get('/product/{slug}','ProductPageController@index');
Route::get('/product-add','ProductPageController@addToCart')->name('product.add');
Route::post('/product-add-review','ProductPageController@addReview')->name('product.add-review');


/* cart page */
Route::get('/cart','CartPageController@index');
Route::get('/cart/removeall','CartPageController@removeAllItems')->name('cart.removeall');
Route::post('/cart/update','CartPageController@updateItems')->name('cart.update');
Route::get('/cart/discountremove','CartPageController@discountRemove');
Route::get('/cart/removerowitem/{rowId}','CartPageController@rowItemRemove');
Route::get('/cart/discount','CartPageController@addDiscount')->name('cart.add-discount');

/*checkout page*/
Route::get('/checkout','CheckoutPageController@index')->name('checkout');
Route::get('/payment','CheckoutPageController@payment')->name('payment');
Route::post('/checkout/store','CheckoutPageController@processCheckout')->name('checkout.process');
Route::post('/checkout/login','CheckoutPageController@login')->name('checkout.login');

/* cash on delivery */
Route::post('/checkout/cod','CheckoutPageController@processCod')->name('checkout.cod');
/*stripe */
Route::post('/stripe/pay','StripeController@processStripe')->name('payment.stripe-process');
/* paypal */
Route::post('paypal/ec-checkout', 'PayPalController@getExpressCheckout')->name('checkout.paypal');
Route::get('paypal/ec-checkout-success', 'PayPalController@getExpressCheckoutSuccess');

/* thank you page*/
Route::get('/thankyou','ThankyouPageController@index')->name('thankyou');

/* get product*/
Route::get('/orders/get-product','ProductPageController@getProducts')->name('orders.get-product');

/* user prfile */
Route::group(['middleware' => 'auth'], function () {
    //dashboard
    Route::get('/dashboard','UserProfilePageController@index');
    //edit info
    Route::get('/dashboard/edit-info','UserProfilePageController@editInfo');
    Route::post('/dashboard/edit-info/post','UserProfilePageController@infoChange')->name('profile.info');
    Route::post('/dashboard/edit-info/avatar','UserProfilePageController@avatar')->name('profile.avatar');
    Route::post('/dashboard/edit-info/avatar-remove','UserProfilePageController@avatar_remove')->name('profile.avatar_remove');
    //view orders
    Route::get('/dashboard/orders','UserOrderPageController@index');
    Route::get('/dashboard/user-orders','UserOrderPageController@userOrders')->name('user.orders');
    Route::get('/dashboard/orders/view/{id}','UserOrderPageController@viewOrderDetails');
    //edit address
    Route::get('/dashboard/edit-address','UserAddressPageController@index');
    Route::post('/dashboard/edit-address/billing','UserAddressPageController@billing')->name('profile.billing');
    Route::post('/dashboard/edit-address/shipping','UserAddressPageController@shipping')->name('profile.shipping');

});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
