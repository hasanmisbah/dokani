<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth']], function () {

Route::get('/', 'Dashboard\DashboardController@index')->name('dashboard');

//###### Sales ##########
    Route::get('sales/new', 'Sales\SalesController@index')->name('sales');
    Route::get('sales/search', 'Sales\SalesController@search_product')->name('search_sku');
    Route::get('sales/save_temp', 'Sales\SalesController@save_temp')->name('temp_save');
    Route::get('sales/get_temp', 'Sales\SalesController@get_temp_data')->name('temp_get');
    Route::get('sales/temp_del', 'Sales\SalesController@temp_del')->name('temp_del');
    Route::get('sales/temp_qty', 'Sales\SalesController@update_tmp_qty')->name('update_tmp_qty');
    Route::get('sales/temp_price', 'Sales\SalesController@update_tmp_price')->name('update_tmp_price');

    //invoice
    Route::get('sales/invoice', 'Sales\InvoiceController@invoice_list')->name('invoice_list');


    Route::post('invoice/new', 'Sales\InvoiceController@new_invoice')->name('new_invoice');

    Route::get('invoice/show/{id}', 'Sales\InvoiceController@show_invoice')->name('show_invoice');

    Route::get('invoice/edit/{id}', 'Sales\InvoiceController@show_edit')->name('edit_invoice');
    Route::post('invoice/edit/item', 'Sales\InvoiceController@edit_item')->name('edit_invoice_item');
    Route::get('invoice/item/del/{id}', 'Sales\InvoiceController@del_item')->name('del_invoice_item');
    Route::post('invoice/edit/oc_discount', 'Sales\InvoiceController@edit_oc_discount')->name('edit_invoice_discount');
    Route::post('invoice/edit/edit_pay', 'Sales\InvoiceController@edit_pay')->name('edit_pay');
    Route::get('invoice/edit/del_pay/{id}', 'Sales\InvoiceController@del_pay')->name('del_pay');
    Route::post('invoice/edit/new_pay', 'Sales\InvoiceController@new_pay')->name('new_pay');


    Route::get('invoice/del/{id}', 'Sales\InvoiceController@del')->name('del_invoice');
//###### Sales ##########

    //###### purchase ##########

    Route::get('purchase/new', 'Purchase\PurchaseController@index')->name('purchase');
    Route::get('purchase/search', 'Purchase\PurchaseController@search_product')->name('p_search_sku');
    Route::get('purchase/save_temp', 'Purchase\PurchaseController@save_temp')->name('p_temp_save');
    Route::get('purchase/get_temp', 'Purchase\PurchaseController@get_temp_data')->name('p_temp_get');
    Route::get('purchase/temp_del', 'Purchase\PurchaseController@temp_del')->name('p_temp_del');
    Route::get('purchase/temp_qty', 'Purchase\PurchaseController@update_tmp_qty')->name('p_update_tmp_qty');
    Route::get('purchase/temp_price', 'Purchase\PurchaseController@update_tmp_price')->name('p_update_tmp_price');


    //###### purchase ##########

//###### Customer ##########
Route::get('customer', 'Customer\CustomerController@index')->name('customer');
Route::post('customer/save', 'Customer\CustomerController@save')->name('customer-save');
Route::post('customer/edit', 'Customer\CustomerController@edit')->name('customer-edit');
Route::get('customer/del/{id}', 'Customer\CustomerController@del')->name('customer-del');
//###### /Customer ##########

//###### Supplier ##########
Route::get('supplier', 'Supplier\SupplierController@index')->name('supplier');
Route::post('supplier', 'Supplier\SupplierController@save')->name('supplier-save');
Route::post('supplier/edit', 'Supplier\SupplierController@edit')->name('supplier-edit');
Route::get('supplier/del/{id}', 'Supplier\SupplierController@del')->name('supplier-del');
//###### Supplier ########## 

//###### Product ##########
Route::get('product/kuddus/jorina/morjina/sokina', 'Product\ProductController@index')->name('product');
Route::post('product/save', 'Product\ProductController@save')->name('product-save');
Route::post('product/edit', 'Product\ProductController@edit')->name('product-edit');
Route::get('mofiz/{id}', 'Product\productController@del')->name('product-del');
//###### Product ##########

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
