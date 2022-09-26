<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductListController;
use App\Http\Controllers\CartController;

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

Route::get('/', [ProductListController::class, 'list'])->name('product.all');
Route::get('/categories/{CategoryId}', [ProductListController::class, 'list'])->name('product.category');
Route::get('/cart', [CartController::class, 'list'])->name('cart.get');
Route::post('/cart', [CartController::class, 'add'])->name('cart.post');
Route::post('/order', 'OrderController@exec')->name('order.exec');
