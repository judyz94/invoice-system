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

Route::resource('invoicesProducts', 'InvoiceProductController');
Route::get('/invoicesProducts/{id}/confirmDelete', 'InvoiceProductController@confirmDelete');

Route::get('/invoices/{invoice}/invoicesProducts/create', 'InvoiceProductController@create');
Route::get('/invoices/{invoice}/invoicesProducts/edit', 'InvoiceProductController@edit');

Route::post('/invoices/{invoice}/invoicesProducts', 'InvoiceProductController@store');


Route::get('invoiceproduct', 'InvoiceProductController@invoicesProducts');

