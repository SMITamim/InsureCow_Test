<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;



Route::group(['name' => 'landingPage'], function () {
    Route::get('/landingPage', [LandingPageController::class, 'addlandingPageView'])->name('landingPage');
});

/* Route::group(['name' => 'product'], function () {
    Route::get('/product', [ProductController::class, 'Product'])->name('product');
    Route::post('/add-product', [ProductController::class, 'addProduct'])->name('addProduct');
    Route::get('/get-product/{id}', [ProductController::class, 'getProduct'])->name('getProduct');
    Route::post('/delete-product', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
    Route::post('/update-product', [ProductController::class, 'updateProduct'])->name('updateProduct');
}); */


// Example route using auth middleware
Route::middleware(['auth'])->group(function () {
    // Your authenticated routes go here
    Route::group(['name' => 'product', 'middleware' => 'checkAdmin'], function () {
        Route::get('/product', [ProductController::class, 'Product'])->name('product');
        Route::post('/add-product', [ProductController::class, 'addProduct'])->name('addProduct');
        Route::get('/get-product/{id}', [ProductController::class, 'getProduct'])->name('getProduct');
        Route::post('/delete-product', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
        Route::post('/update-product', [ProductController::class, 'updateProduct'])->name('updateProduct');
    });
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


