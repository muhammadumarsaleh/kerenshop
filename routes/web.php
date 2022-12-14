<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;

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
Route::resource('post', PostController::class)->scoped(['post' => 'slug']);


// perhatikan susunan route pada yang menggunakan parameter, sering tertimpa

Route::get('/order', [OrderController::class, 'index'])->name('order.index');
Route::get('/order/search', [OrderController::class, 'search'])->name('order.search');
Route::get('/order/checkout', [OrderController::class, 'checkout'])->name('order.checkout')->Middleware('auth');
Route::get('/order/{product:slug}/', [OrderController::class, 'detail'])->name('order.detail');
Route::post('/order/{product}/', [OrderController::class, 'order'])->name('order.order')->Middleware('auth');
Route::post('/order/update/{product}', [OrderController::class, 'updateJumlah'])->name('order.update')->Middleware('auth');
Route::delete('/order/{orderdetail}', [OrderController::class, 'delete'])->name('order.delete')->Middleware('auth');



Route::prefix('admin')
        ->middleware(['auth', 'admin'])
        ->group(function(){
    Route::get('/', [DashboardController::class, 'index']);
});
Auth::routes(['verify' => true]);