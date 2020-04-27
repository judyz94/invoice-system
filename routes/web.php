<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/',  'Auth\LoginController@system');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/homeCustomer', 'HomeController@customer')->name('homeCustomer')->middleware('can:home.customer');

Route::middleware(['auth'])->group(function () {

    //USERS
    Route::get('/users/', 'UserController@index')->name('users.index')
        ->middleware('can:users.index');

    Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit')
        ->middleware('can:users.edit');

    Route::put('/users/{user}/', 'UserController@update')->name('users.update')
        ->middleware('can:users.edit');

    Route::get('/users/{user}/', 'UserController@show')->name('users.show')
        ->middleware('can:users.show');

    Route::delete('/users/{user}', 'UserController@destroy')->name('users.destroy')
        ->middleware('can:users.destroy');


    //INVOICES
    Route::get('/invoices/', 'InvoiceController@index')->name('invoices.index')
        ->middleware('can:invoices.index');

    Route::get('/invoices/create', 'InvoiceController@create')->name('invoices.create')
        ->middleware('can:invoices.create');

    Route::post('/invoices/', 'InvoiceController@store')->name('invoices.store')
        ->middleware('can:invoices.create');

    Route::get('/invoices/{invoice}/edit', 'InvoiceController@edit')->name('invoices.edit')
        ->middleware('can:invoices.edit');

    Route::put('/invoices/{invoice}/', 'InvoiceController@update')->name('invoices.update')
        ->middleware('can:invoices.edit');

    Route::get('/invoices/{invoice}/', 'InvoiceController@show')->name('invoices.show')
        ->middleware('can:invoices.show');

    Route::delete('/invoices/{invoice}', 'InvoiceController@destroy')->name('invoices.destroy')
        ->middleware('can:invoices.destroy');

    Route::post('/import/invoices', 'InvoiceController@import')->name('invoices.import')
        ->middleware('can:invoices.import');


    //INVOICE DETAILS
    Route::post('invoices/{invoice}/products')->uses('InvoiceController@addProduct')->name('invoices.products.store')
        ->middleware('can:details.create');

    Route::get('/invoices/{invoice}/products/{product}/edit', 'InvoiceProductController@edit')->name('invoiceProduct.edit')
        ->middleware('can:details.edit');

    Route::put('/invoices/{invoice}/products/{product}')->uses('InvoiceProductController@update')->name('invoiceProduct.update')
        ->middleware('can:details.edit');

    Route::delete('/invoices/{invoice}/products/{product}', 'InvoiceProductController@destroy')->name('invoiceProduct.destroy')
        ->middleware('can:details.destroy');


    //CUSTOMERS
    Route::get('/customers/', 'CustomerController@index')->name('customers.index')
        ->middleware('can:customers.index');

    Route::get('/customers/create', 'CustomerController@create')->name('customers.create')
        ->middleware('can:customers.create');

    Route::post('/customers/', 'CustomerController@store')->name('customers.store')
        ->middleware('can:customers.create');

    Route::get('/customers/{customer}/edit', 'CustomerController@edit')->name('customers.edit')
        ->middleware('can:customers.edit');

    Route::put('/customers/{customer}/', 'CustomerController@update')->name('customers.update')
        ->middleware('can:invoices.edit');

    Route::get('/customers/{customer}/', 'CustomerController@show')->name('customers.show')
        ->middleware('can:customers.show');

    Route::delete('/customers/{customer}', 'CustomerController@destroy')->name('customers.destroy')
        ->middleware('can:customers.destroy');


    //SELLERS
    Route::get('/sellers/', 'SellerController@index')->name('sellers.index')
        ->middleware('can:sellers.index');

    Route::get('/sellers/create', 'SellerController@create')->name('sellers.create')
        ->middleware('can:sellers.create');

    Route::post('/sellers/', 'SellerController@store')->name('sellers.store')
        ->middleware('can:sellers.create');

    Route::get('/sellers/{seller}/edit', 'SellerController@edit')->name('sellers.edit')
        ->middleware('can:sellers.edit');

    Route::put('/sellers/{seller}/', 'SellerController@update')->name('sellers.update')
        ->middleware('can:sellers.edit');

    Route::get('/sellers/{seller}/', 'SellerController@show')->name('sellers.show')
        ->middleware('can:sellers.show');

    Route::delete('/sellers/{seller}', 'SellerController@destroy')->name('sellers.destroy')
        ->middleware('can:sellers.destroy');


    //PRODUCTS
    Route::get('/products/', 'ProductController@index')->name('products.index')
        ->middleware('can:products.index');

    Route::get('/products/create', 'ProductController@create')->name('products.create')
        ->middleware('can:products.create');

    Route::post('/products/', 'ProductController@store')->name('products.store')
        ->middleware('can:products.create');

    Route::get('/products/{product}/edit', 'ProductController@edit')->name('products.edit')
        ->middleware('can:products.edit');

    Route::put('/products/{product}/', 'ProductController@update')->name('products.update')
        ->middleware('can:products.edit');

    Route::delete('/products/{product}', 'ProductController@destroy')->name('products.destroy')
        ->middleware('can:products.destroy');


    //MODALS
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


    //API INTEGRATION
    Route::post('/invoices/{invoice}', 'PaymentController@store')->name('payments.store')
        ->middleware('can:payments.store');

    Route::get('/invoices/{invoice}/payments/{payment}', 'PaymentController@show')->name('payments.show')
        ->middleware('can:payments.show');

    Route::get('/payment/show/{invoice}/', 'paymentController@payments')->name('payments')
        ->middleware('can:payments.index');


    //DOWNLOAD
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


    //EXPORTS
    Route::get('/invoices/export/filter', 'ExportController@filter')->name('invoices.filter')
        ->middleware('can:invoices.filter');

    Route::get('/export/report/{type}/{sinceDate}/{untilDate}/{extension}', 'ExportController@exportReport')->name('export.report')
        ->middleware('can:export.report');

    Route::get('/export/reports/', 'ExportController@index')->name('reports.index')
        ->middleware('can:reports.index');

    Route::delete('/report/destroy/{notification}', 'ExportController@destroy')->name('reports.destroy')
        ->middleware('can:reports.destroy');

    Route::get('/report/download/{notification}', 'ExportController@downloadFile')->name('report.download');


    //PERMISSIONS
    Route::get('/permissions/', 'PermissionController@index')->name('permissions.index')
        ->middleware('can:permissions.index');

    Route::get('/permissions/create', 'PermissionController@create')->name('permissions.create')
        ->middleware('can:permissions.create');

    Route::post('/permissions/', 'PermissionController@store')->name('permissions.store')
        ->middleware('can:permissions.create');

    Route::get('/permissions/{permission}/edit', 'PermissionController@edit')->name('permissions.edit')
        ->middleware('can:permissions.edit');

    Route::put('/permissions/{permission}/', 'PermissionController@update')->name('permissions.update')
        ->middleware('can:permissions.edit');

    Route::delete('/permissions/{permission}', 'PermissionController@destroy')->name('permissions.destroy')
        ->middleware('can:permissions.destroy');


    //ROLES
    Route::get('/roles/', 'RoleController@index')->name('roles.index')
        ->middleware('can:roles.index');

    Route::get('/roles/create', 'RoleController@create')->name('roles.create')
        ->middleware('can:roles.create');

    Route::post('/roles/', 'RoleController@store')->name('roles.store')
        ->middleware('can:roles.create');

    Route::get('/roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
        ->middleware('can:roles.edit');

    Route::put('/roles/{role}/', 'RoleController@update')->name('roles.update')
        ->middleware('can:roles.edit');

    Route::delete('/roles/{role}', 'RoleController@destroy')->name('roles.destroy')
        ->middleware('can:roles.destroy');
});

