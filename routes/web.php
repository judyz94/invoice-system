<?php

Auth::routes();
Route::get('/',  'Auth\LoginController@system');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/homeCustomer', 'HomeController@customer')->name('homeCustomer')->middleware('can:homeCustomer');

Route::middleware(['auth'])->group(function () {

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

    //Exports
    Route::get('/invoiceReport/invoices', 'ExportController@invoiceReport')->name('invoiceReport')
        ->middleware('can:invoiceReport');

    Route::get('/invoices/export/filter', 'ExportController@filter')->name('invoices.filter')
        ->middleware('can:invoices.filter');

    Route::get('/invoices/{invoice}/downloadPDF/', 'ExportController@downloadPDF')->name('downloadPDF')
        ->middleware('can:downloadPDF');

    Route::get('/payments/{invoice}/downloadPDF/', 'ExportController@downloadPaymentPDF')->name('downloadPDF.payment')
        ->middleware('can:downloadPDF.payment');

    Route::get('/invoices/downloadXLS/{since_date}/{until_date}', 'ExportController@downloadXLS')->name('downloadXLS')
        ->middleware('can:downloadXLS');

    Route::get('/invoices/downloadCSV/{since_date}/{until_date}', 'ExportController@downloadCSV')->name('downloadCSV')
        ->middleware('can:downloadCSV');

    Route::get('/invoices/downloadTXT/{since_date}/{until_date}', 'ExportController@downloadTXT')->name('downloadTXT')
        ->middleware('can:downloadTXT');

    Route::get('/exportAll/invoices', 'ExportController@exportAll')->name('exportAll')
        ->middleware('can:exportAll');

    Route::get('/XLS/invoices', 'ExportController@XLS')->name('XLS')->middleware('can:XLS');

    Route::get('/CSV/invoices', 'ExportController@CSV')->name('CSV')->middleware('can:CSV');

    Route::get('/TXT/invoices', 'ExportController@TXT')->name('TXT')->middleware('can:TXT');

    Route::get('/export/show/', 'ExportController@show')->name('exports.show')->middleware('can:exports.show');
});

