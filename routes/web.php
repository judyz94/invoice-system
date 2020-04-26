<?php

Auth::routes();
Route::get('/',  'Auth\LoginController@system');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/homeCustomer', 'HomeController@customer')->name('homeCustomer')->middleware('can:home.customer');

Route::middleware(['auth'])->group(function () {

    //Resource invoices, customers, sellers, products, users, permissions, roles
    Route::resource('invoices', 'InvoiceController');
    Route::resource('customers', 'CustomerController');
    Route::resource('sellers', 'SellerController');
    Route::resource('products', 'ProductController')->except('show');

    Route::resource('users', 'UserController')->except('create', 'store');
    Route::resource('permissions', 'PermissionController')->except('show');
    Route::resource('roles', 'RoleController')->except('show');

    //Import invoices
    Route::post('/import/invoices', 'InvoiceController@import')->name('invoices.import')
        ->middleware('can:invoices.import');

    //Invoice details
    Route::post('invoices/{invoice}/products')->uses('InvoiceController@addProduct')->name('invoices.products.store')
        ->middleware('can:details.create');

    Route::get('/invoices/{invoice}/products/{product}/edit', 'InvoiceProductController@edit')->name('invoiceProduct.edit')
        ->middleware('can:details.edit');

    Route::put('/invoices/{invoice}/products/{product}')->uses('InvoiceProductController@update')->name('invoiceProduct.update')
        ->middleware('can:details.edit');

    Route::delete('/invoices/{invoice}/products/{product}', 'InvoiceProductController@destroy')->name('invoiceProduct.destroy')
        ->middleware('can:details.destroy');

    //Modals
    Route::get('/orderSummary/invoices', 'InvoiceController@orderSummary')->name('orderSummary')
        ->middleware('can:order.summary');

    Route::get('/overdueInvoice/invoices', 'InvoiceController@overdueInvoice')->name('overdueInvoice')
        ->middleware('can:overdue.invoice');

    Route::get('/invoiceProduct/invoices', 'InvoiceController@invoiceProduct')->name('invoiceProduct')
        ->middleware('can:invoice.product');

    Route::get('/pendingPayment/invoices', 'InvoiceController@pendingPayment')->name('pendingPayment')
        ->middleware('can:pending.payment');

    Route::get('/invoiceReport/invoices', 'ExportController@invoiceReport')->name('invoiceReport')
        ->middleware('can:invoice.report');

    Route::get('/exportAll/invoices', 'ExportController@exportAll')->name('exportAll')
        ->middleware('can:export.all');

    //API integration
    Route::post('/invoices/{invoice}', 'PaymentController@store')->name('payments.store')
        ->middleware('can:payments.store');

    Route::get('/invoices/{invoice}/payments/{payment}', 'PaymentController@show')->name('payments.show')
        ->middleware('can:payments.show');

    Route::get('/payment/show/{invoice}/', 'paymentController@payments')->name('payments')
        ->middleware('can:payments.index');

    //Download
    Route::get('/invoices/{invoice}/downloadPDF/', 'DownloadController@downloadInvoicePDF')->name('downloadPDF.invoice')
        ->middleware('can:download.PDF.invoice');

    Route::get('/payments/{invoice}/downloadPDF/', 'DownloadController@downloadPaymentPDF')->name('downloadPDF.payment')
        ->middleware('can:download.PDF.payment');

    Route::get('/XLS/invoices', 'DownloadController@downloadXLS')->name('downloadXLS')
        ->middleware('can:download.XLS');

    Route::get('/CSV/invoices', 'DownloadController@downloadCSV')->name('downloadCSV')
        ->middleware('can:download.CSV');

    Route::get('/TXT/invoices', 'DownloadController@downloadTXT')->name('downloadTXT')
        ->middleware('can:download.TXT');

    //Exports
    Route::get('/invoices/export/filter', 'ExportController@filter')->name('invoices.filter')
        ->middleware('can:invoices.filter');

    Route::get('/export/report/{type}/{sinceDate}/{untilDate}/{extension}', 'ExportController@exportReport')->name('export.report')
        ->middleware('can:export.report');

    Route::get('/export/reports/', 'ExportController@index')->name('reports.index');

    Route::delete('/report/destroy/{notification}', 'ExportController@destroy')->name('reports.destroy');


    Route::get('/report/download/{notification}', 'ExportController@downloadFile')->name('report.download');
});

