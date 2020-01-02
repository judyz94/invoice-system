<?php

Auth::routes();
Route::get('/', 'HomeController@welcome');
Route::get('home', 'HomeController@index')->name('home');

Route::resource('invoices', 'InvoiceController');
Route::post('invoices/{invoice}/products')->uses('InvoiceController@addProduct')->name('invoices.products.store');

Route::resource('customers', 'CustomerController');
Route::resource('sellers', 'SellerController');
Route::resource('products', 'ProductController');

Route::post('/autocomplete/fetch', 'InvoiceProductController@fetch');
Route::get('/invoices/{invoice}/products/create', 'InvoiceProductController@create')->name('invoiceProduct.create');
//Route::post('/invoices/{invoice}/products', 'InvoiceProductController@store')->name('invoiceProduct.store');
Route::get('/invoices/{invoice}/products/{product}/edit', 'InvoiceProductController@edit')->name('invoiceProduct.edit');
Route::put('/invoices/{invoice}/products/{product}', 'InvoiceProductController@update')->name('invoiceProduct.update');
Route::delete('/invoices/{invoice}/products/{product}', 'InvoiceProductController@destroy')->name('invoiceProduct.destroy');

Route::post('/import/invoices', 'InvoiceController@import')->name('invoices.import');
//Route::get('/import', 'InvoiceController@import');
