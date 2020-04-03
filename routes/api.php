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

Route::apiResources([
    'invoices' => 'Api\InvoiceController',
    'customers' => 'Api\CustomerController',
    'sellers' => 'Api\SellerController',
    'products' => 'Api\ProductController',
]);

Route::get('invoices/{invoice}/products', 'Api\InvoiceProductController@index');
Route::post('invoices/{invoice}/products', 'Api\InvoiceProductController@store');
Route::put('/invoices/{invoice}/products/{product}')->uses('Api\InvoiceProductController@update');
Route::delete('/invoices/{invoice}/products/{product}', 'Api\InvoiceProductController@destroy');

