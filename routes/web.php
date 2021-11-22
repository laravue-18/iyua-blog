<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\OrderController;

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
\Illuminate\Support\Facades\Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('podcast', [HomeController::class, 'podcast'])->name('podcast');
Route::get('podcast/{id}', [HomeController::class, 'showPodcast'])->name('podcast.show');

Route::get('store', [HomeController::class, 'store'])->name('store');
Route::get('products/{id}', [HomeController::class, 'showProduct'])->name('products.show');

Route::get('posts', [HomeController::class, 'blog'])->name('posts');
Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');

Route::get('pages/{page}', [HomeController::class, 'showPage'])->name('pages.show');

Route::post('orders', [OrderController::class, 'store'])->name('orders.store');

Route::prefix('user')->name('user.')->middleware('auth')->group(function(){
    Route::view('dashboard', 'user.dashboard')->name('dashboard');
    Route::resource('posts', PostController::class);
    Route::resource('categories', \App\Http\Controllers\CategoryController::class);
    Route::resource('product-categories', \App\Http\Controllers\ProductCategoryController::class);
    Route::resource('products', \App\Http\Controllers\ProductController::class);
    Route::resource('orders', \App\Http\Controllers\OrderController::class);

    Route::get('paypal', function(){
        \Illuminate\Support\Facades\Log::alert(request());
    })->name('paypal');

    Route::view('setting', 'user.setting')->name('setting');
});

