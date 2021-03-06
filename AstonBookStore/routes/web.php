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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('books', 'BookController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Users cannot get to these pages until they are logged in
//It will redirect non-auth users to the login page if they try to access these pages
Route::group(['middleware' => ['auth']], function () {
    Route::view('/admin', 'admin/admin');
    Route::get('/admin/stockroom', 'BookController@stockroom');
    Route::get('orders',
        'OrderController@displayOrders')->name('display_orders');
    Route::get('/basket', 'OrderController@getBasket');
    Route::get('/add-to-basket/{book}', 'OrderController@addToBasket');
    Route::delete('/remove-from-basket{book}', 'OrderController@removeFromBasket');
    Route::post('/basket/{book}', 'OrderController@updateBasketQuantity');
    Route::get('/checkout', 'OrderController@getCheckout')->name('checkout');
    Route::post('/checkout', 'OrderController@postCheckout')->name('checkout');
    Route::view('/order/success', '/ordersuccess');
    Route::get('send-receipt', 'OrderController@sendNotification');
    Route::post('/admin/stockroom/{book}', 'BookController@updateStock');
});
