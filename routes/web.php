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
    Route::get('invoice/del/{id}', 'Sales\InvoiceController@del')->name('del_invoice');
//###### Sales ##########

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
