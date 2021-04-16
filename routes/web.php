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

Route::get('/', 'IndexPageController@index')->name('index');
Route::get('/about', 'IndexPageController@about')->name('about');


//PRODUCT ROUTES
Route::get('/shop/{slug}', 'ProductController@show')->name('product.show');
Route::get('/shop/category/{slug}', 'ProductController@show_category')->name('product.show_category');

//CART ROUTES
Route::get('/cart','CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@create')->name('cart.create');
Route::get('/destroy/{product}', 'CartController@destroy')->name('cart.destroy');


//ORDER TRACK ROUTES
Route::get('/trackorder', 'TrackorderController@index')->name('trackorder.index');
Route::post('/trackorder', 'TrackorderController@show')->name('trackorder.show');

//ORDER TRACK ROUTES
Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
Route::post('/checkout', 'CheckoutController@create')->name('checkout.create');
Route::post('/payment-complete', 'CheckoutController@store')->name('payment.store');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
