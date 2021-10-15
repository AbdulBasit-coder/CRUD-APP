<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('product/', App\Http\Controllers\ProductController::class);
Route::get('product/product-response','App\Http\Controllers\ProductController@product_response');
Route::get('product/edit/{id}',['as'=>'product.edit','uses'=>'App\Http\Controllers\ProductController@edit']);
Route::put('product/update/{id}','App\Http\Controllers\ProductController@update_product');
Route::get('product/delete/{id}','App\Http\Controllers\ProductController@delete');