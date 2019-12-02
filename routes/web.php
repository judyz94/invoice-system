<?php

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');
Route::get('dashboard', 'DashboardController@index');

Route::resource('invoices', 'InvoiceController');
Route::get('/invoices/{id}/confirmDelete', 'InvoiceController@confirmDelete');

Route::resource('customers', 'CustomerController');
Route::get('/customers/{id}/confirmDelete', 'CustomerController@confirmDelete');

Route::get('/customers/{customer}/invoices/create', 'InvoiceController@create');
Route::post('/customers/{customer}/invoices', 'InvoiceController@store');

Route::get('/invoices/{invoice}/products/create', 'InvoiceProductController@create');
Route::post('/invoices/{invoice}/products', 'InvoiceProductController@store');
Route::get('/invoices/{invoice}/products/{product}/edit', 'InvoiceProductController@edit');
Route::put('/invoices/{invoice}/products/{product}', 'InvoiceProductController@update');
Route::get('/invoices/{invoice}/products/{id}/confirmDelete', 'InvoiceProductController@confirmDelete');
Route::delete('/invoices/{invoice}/products', 'InvoiceProductController@destroy');

