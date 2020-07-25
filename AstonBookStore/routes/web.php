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
//Testing git changes
Route::get('/', function () {
    return view('welcome');
});
Route::resource('books','BookController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Users cannot get to these pages until they are logged in
//It will redirect non-auth users to the login page if they try to access these pages
Route::group(['middleware' => ['auth']], function() {
    Route::view('/admin', 'admin/admin');
    Route::get('/admin/stockroom', 'BookController@stockroom');
    Route::get('orders',
        'OrderController@displayOrders')->name('display_orders');
    Route::get('/basket', 'BookController@getBasket');
    Route::get('/add-to-basket/{book}', 'BookController@addToBasket');
    Route::delete('/remove-from-basket{book}', 'BookController@removeFromBasket');
    Route::post('/basket/{book}', 'BookController@updateBasketQuantity');
    Route::get('/checkout', 'BookController@getCheckout')->name('checkout');
    Route::post('/checkout', 'BookController@postCheckout')->name('checkout');
    Route::view('/order/success', '/ordersuccess');
    Route::post('/admin/stockroom/{book}', 'BookController@updateStock');
});
