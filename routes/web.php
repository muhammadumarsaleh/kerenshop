<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use GuzzleHttp\Middleware;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');


Route::resource('product', ProductController::class);

Route::get('/order', [OrderController::class, 'index'])->name('order.index');
Route::get('/order/{product:slug}/detail', [OrderController::class, 'detail'])->name('order.detail');
Route::post('/order/{product}/', [OrderController::class, 'order'])->name('order.order')->Middleware('auth');
Route::get('/order/checkout', [OrderController::class, 'checkout'])->name('order.checkout')->Middleware('auth');



Route::prefix('admin')
        ->middleware(['auth', 'admin'])
        ->group(function(){
    Route::get('/', [DashboardController::class, 'index']);
});
Auth::routes(['verify' => true]);

