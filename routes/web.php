<?php

//User auth
Auth::routes();

Route::middleware(['auth'])->group(function () {
    //Home
    Route::get('/', 'HomeController@index')->name('home');

    //Resource invoices, customers, sellers, products, users, permissions, roles
    Route::resource('invoices', 'InvoiceController');
    Route::resource('customers', 'CustomerController');
    Route::resource('sellers', 'SellerController');
    Route::resource('products', 'ProductController')->except('show');
    Route::resource('users', 'UserController')->except('create', 'store');
    Route::resource('permissions', 'PermissionController')->except('show');
    Route::resource('roles', 'RoleController')->except('show');

    //Invoice details
    Route::post('invoices/{invoice}/products')->uses('InvoiceController@addProduct')->name('invoices.products.store')
        ->middleware('can:invoices.products.store');

    Route::get('/invoices/{invoice}/products/{product}/edit', 'InvoiceProductController@edit')->name('invoiceProduct.edit')
        ->middleware('can:invoiceProduct.edit');

    Route::put('/invoices/{invoice}/products/{product}')->uses('InvoiceProductController@update')->name('invoiceProduct.update')
        ->middleware('can:invoiceProduct.edit');

    Route::delete('/invoices/{invoice}/products/{product}', 'InvoiceProductController@destroy')->name('invoiceProduct.destroy')
        ->middleware('can:invoiceProduct.destroy');

    //Import invoices
    Route::post('/import/invoices', 'InvoiceController@import')->name('invoices.import')
        ->middleware('can:invoices.import');

    //Modals
    Route::get('/orderSummary/invoices', 'InvoiceController@orderSummary')->name('orderSummary')
        ->middleware('can:orderSummary');

    Route::get('/overdueInvoice/invoices', 'InvoiceController@overdueInvoice')->name('overdueInvoice')
        ->middleware('can:overdueInvoice');

    Route::get('/invoiceProduct/invoices', 'InvoiceController@invoiceProduct')->name('invoiceProduct')
        ->middleware('can:invoiceProduct');

    Route::get('/pendingPayment/invoices', 'InvoiceController@pendingPayment')->name('pendingPayment')
        ->middleware('can:pendingPayment');

    //API integration
    Route::post('/invoices/{invoice}', 'PaymentController@store')->name('payments.store')
        ->middleware('can:payments.store');

    Route::get('/invoices/{invoice}/payments/{payment}', 'PaymentController@show')->name('payments.show')
        ->middleware('can:payments.show');

    Route::get('/payment/show/{invoice}/', 'paymentController@payments')->name('payments')
        ->middleware('can:payments');
});

