<?php

Auth::routes();
Route::get('/', 'HomeController@welcome');
Route::get('home', 'HomeController@index')->name('home');

Route::resource('invoices', 'InvoiceController');
Route::resource('customers', 'CustomerController');
Route::resource('sellers', 'SellerController');
Route::resource('products', 'ProductController');

Route::get('users', 'UserController@index')->name('users.index');
Route::get('/users/{user}', 'UserController@show')->name('users.show');
Route::delete('/users/{user}', 'UserController@destroy')->name('users.destroy');

//Route::post('/autocomplete/fetch', 'InvoiceProductController@fetch');
//Route::get('/invoices/{invoice}/products/create', 'InvoiceProductController@create')->name('invoiceProduct.create');
//Route::post('/invoices/{invoice}/products', 'InvoiceProductController@store')->name('invoiceProduct.store');
Route::post('invoices/{invoice}/products')->uses('InvoiceController@addProduct')->name('invoices.products.store');
Route::get('/invoices/{invoice}/products{product}/edit', 'InvoiceProductController@edit')->name('invoiceProduct.edit');

Route::post('invoices/{invoice}/products/{product}')->uses('InvoiceController@updateProduct')->name('invoiceProduct.update');
Route::delete('/invoices/{invoice}/products/{product}', 'InvoiceProductController@destroy')->name('invoiceProduct.destroy');

Route::post('/import/invoices', 'InvoiceController@import')->name('invoices.import');

