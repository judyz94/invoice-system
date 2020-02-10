<?php

Auth::routes();
Route::get('/', 'HomeController@welcome');
Route::get('home', 'HomeController@index')->name('home');

Route::resource('invoices', 'InvoiceController');
Route::resource('customers', 'CustomerController');
Route::resource('sellers', 'SellerController');
Route::resource('products', 'ProductController');

Route::post('invoices/{invoice}/products')->uses('InvoiceController@addProduct')->name('invoices.products.store');
Route::get('/invoices/{invoice}/products/{product}/edit', 'InvoiceProductController@edit')->name('invoiceProduct.edit');

//Route::put('invoices/{invoice}/products', 'InvoiceProductController@update')->name('invoiceProduct.update');
Route::put('/invoices/{invoice}/products/{product}')->uses('InvoiceProductController@update')->name('invoiceProduct.update');

Route::delete('/invoices/{invoice}/products/{product}', 'InvoiceProductController@destroy')->name('invoiceProduct.destroy');

Route::post('/import/invoices', 'InvoiceController@import')->name('invoices.import');

Route::get('/orderSummary/invoices', 'InvoiceController@orderSummary')->name('orderSummary');
Route::post('/invoices/{invoice}/payments/attemp', 'PaymentAttemptController@store')->name('invoices.payments.attemp');

