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

Route::get('/', 'Dashboard\DashboardController@index')->name('dashboard'); 

//###### Customer ##########
Route::get('customer', 'Customer\CustomerController@index')->name('customer');
Route::post('customer/save', 'Customer\CustomerController@save')->name('customer-save');
Route::post('customer/edit', 'Customer\CustomerController@edit')->name('customer-edit');
Route::get('customer/del/{id}', 'Customer\CustomerController@del')->name('customer-del');
//###### /Customer ##########

//###### Supplier ##########
Route::get('supplier', 'Supplier\SupplierController@index')->name('shuhag');
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

//###### Post ##########
Route::get('post', 'Post\PostController@index')->name('post');
//###### Post ##########

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
