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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'WelcomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//api links

Route::get('productapi', 'ProductAPIController@index');
Route::get('productapi/{id}', 'ProductAPIController@show');
Route::post('productapi', 'ProductAPIController@store');
Route::put('productapi', 'ProductAPIController@update');
Route::delete('productapi', 'ProductAPIController@destroy');
////api links


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

Route::get('prods', 'CategoryController@prods');

Route::resource('categories', 'CategoryController');

Route::resource('subcategories', 'SubCategoryController');

Route::resource('productgroups', 'ProductgroupController');

Route::resource('products', 'ProductController');

Route::post('upload', 'ProductController@store');