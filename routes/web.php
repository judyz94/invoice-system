<?php

//User auth
Auth::routes();

//Home
Route::get('/', 'HomeController@index')->name('home');

//Resource invoices, customers, sellers, products, users
Route::resource('invoices', 'InvoiceController');
Route::resource('customers', 'CustomerController');
Route::resource('sellers', 'SellerController');
Route::resource('products', 'ProductController')->except('show');
Route::resource('users', 'UserController')->except('create', 'store');

//Invoice details
Route::post('invoices/{invoice}/products')->uses('InvoiceController@addProduct')->name('invoices.products.store');
Route::get('/invoices/{invoice}/products/{product}/edit', 'InvoiceProductController@edit')->name('invoiceProduct.edit');
Route::put('/invoices/{invoice}/products/{product}')->uses('InvoiceProductController@update')->name('invoiceProduct.update');
Route::delete('/invoices/{invoice}/products/{product}', 'InvoiceProductController@destroy')->name('invoiceProduct.destroy');

//Import invoices
Route::post('/import/invoices', 'InvoiceController@import')->name('invoices.import');

//Modals
Route::get('/orderSummary/invoices', 'InvoiceController@orderSummary')->name('orderSummary');
Route::get('/overdueInvoice/invoices', 'InvoiceController@overdueInvoice')->name('overdueInvoice');
Route::get('/invoiceProduct/invoices', 'InvoiceController@invoiceProduct')->name('invoiceProduct');
Route::get('/pendingPayment/invoices', 'InvoiceController@pendingPayment')->name('pendingPayment');

//API integration
Route::post('/invoices/{invoice}', 'PaymentController@store')->name('payments.store');
Route::get('/invoices/{invoice}/payments/{payment}', 'PaymentController@show')->name('payments.show');
Route::get('/payment/show/{invoice}/', 'paymentController@payments')->name('payments');
