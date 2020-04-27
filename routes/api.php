<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'Api\UserController@login');
Route::post('register', 'Api\UserController@register');

Route::group(['middleware' => 'auth:api'], function() {

    Route::get('details', 'Api\UserController@details');
    Route::post('logout', 'Api\UserController@logout');

    //Invoices
    Route::get('invoices', 'Api\InvoiceController@index')->middleware('can:invoices.index');
    Route::post('invoices', 'Api\InvoiceController@store')->middleware('can:invoices.create');
    Route::put('invoices/{invoice}', 'Api\InvoiceController@update')->middleware('can:invoices.edit');
    Route::get('invoices/{invoice}', 'Api\InvoiceController@show')->middleware('can:invoices.show');
    Route::delete('invoices/{invoice}', 'Api\InvoiceController@destroy')->middleware('can:invoices.destroy');

    //Invoice details
    Route::get('invoices/{invoice}/products', 'Api\InvoiceProductController@index')->middleware('can:details.index');
    Route::post('invoices/{invoice}/products', 'Api\InvoiceProductController@store')->middleware('can:details.create');
    Route::put('/invoices/{invoice}/products/{product}')->uses('Api\InvoiceProductController@update')->middleware('can:details.edit');
    Route::delete('/invoices/{invoice}/products/{product}', 'Api\InvoiceProductController@destroy')->middleware('can:details.destroy');

    //Customers
    Route::get('customers', 'Api\CustomerController@index')->middleware('can:customers.index');
    Route::post('customers', 'Api\CustomerController@store')->middleware('can:customers.create');
    Route::put('customers/{customer}', 'Api\CustomerController@update')->middleware('can:customers.edit');
    Route::delete('customers/{customer}', 'Api\CustomerController@destroy')->middleware('can:customers.destroy');

    //Sellers
    Route::get('sellers', 'Api\SellerController@index')->middleware('can:sellers.index');
    Route::post('sellers', 'Api\SellerController@store')->middleware('can:sellers.create');
    Route::put('sellers/{seller}', 'Api\SellerController@update')->middleware('can:sellers.edit');
    Route::delete('sellers/{seller}', 'Api\SellerController@destroy')->middleware('can:sellers.destroy');

    //Products
    Route::get('products', 'Api\ProductController@index')->middleware('can:products.index');
    Route::post('products', 'Api\ProductController@store')->middleware('can:products.create');
    Route::put('products/{product}', 'Api\ProductController@update')->middleware('can:products.edit');
    Route::delete('products/{product}', 'Api\ProductController@destroy')->middleware('can:products.delete');
});

