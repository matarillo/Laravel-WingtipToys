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

Route::get('/', 'ProductListController@list')->name('product_all');
Route::get('/categories/{CategoryId}', 'ProductListController@list')->name('product_category');
Route::get('/cart', 'CartController@list')->name('cart_get');
Route::post('/cart', 'CartController@add')->name('cart_post');
Route::post('/order', 'OrderController@exec')->name('order_exec');
