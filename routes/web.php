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

Route::get('/', [App\Http\Controllers\MainController::class, 'index']);
Route::get('/contact', [App\Http\Controllers\MainController::class, 'contact'])->name('contact');
Route::get('/about', [App\Http\Controllers\MainController::class, 'about'])->name('about');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/basket', [App\Http\Controllers\BasketController::class, 'index'])->name('basket_index');
    Route::post('/basket', [App\Http\Controllers\BasketController::class, 'storeBasket'])->name('basket_store');
    Route::post('/basket/continue', [App\Http\Controllers\BasketController::class, 'continueOrder'])->name('basket_continue');


    Route::get('/basket/order_store', [App\Http\Controllers\OrderController::class, 'storeOrder'])->name('order_store');
    Route::post('/basket/order_destroy', [App\Http\Controllers\OrderController::class, 'destroyOrder'])->name('order_destroy');

});

Auth::routes();

Route::group(['middleware' => 'auth', 'middleware' => 'admin'], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::group(['prefix' => 'products'], function () {
            Route::get('/', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('product_index');
            Route::get('/add', [App\Http\Controllers\Admin\ProductController::class, 'addProduct'])->name('product_add');
            Route::post('/add', [App\Http\Controllers\Admin\ProductController::class, 'storeProduct'])->name('product_store');

        });

        Route::group(['prefix' => 'buyers'], function () {
            Route::get('/', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('user_index');

        });

        Route::group(['prefix' => 'orders'], function () {
            Route::get('/', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('order_index');

        });
    });
});
