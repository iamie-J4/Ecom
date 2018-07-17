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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();

Route::get('/home', 'HomeController@index');
//route::resource('register1', 'Register1Controller@register')->name('register1');

Route::resource('users', 'UserController');

Route::resource('products', 'ProductController');

Route::resource('payments', 'PaymentController');

Route::resource('trips', 'TripController');

Route::resource('orders', 'OrderController');

Route::resource('carts', 'CartController');

Route::resource('messages', 'MessageController');

Route::resource('addresses', 'AddressController');

Route::resource('invoices', 'InvoiceController');

Route::resource('addresses', 'AddressController');

Route::resource('payments', 'PaymentController');

Route::resource('orders', 'OrderController');

Route::resource('users', 'UserController');

Route::resource('products', 'ProductController');

Route::resource('products', 'ProductController');

Route::post('upload', 'ProductController@store');