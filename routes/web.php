<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['prefix' => 'products'], function () {
        Route::get('/', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('product_index');

    });

    Route::group(['prefix' => 'buyers'], function () {
        Route::get('/', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('user_index');

    });

    Route::group(['prefix' => 'orders'], function () {
        Route::get('/', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('order_index');

    });
});
