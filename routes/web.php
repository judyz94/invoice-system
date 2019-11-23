<?php

Route::get('/', 'HomeController@index');
Route::get('dashboard', 'DashboardController@index');
Route::resource('invoices', 'InvoiceController');
Route::resource('customers', 'CustomerController');
Route::get('/invoices/{id}/confirmDelete', 'InvoiceController@confirmDelete');
Route::get('/customers/{id}/confirmDelete', 'CustomerController@confirmDelete');

