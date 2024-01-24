<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProductController;



Route::group(['name' => 'landingPage'], function () {
    Route::get('/landingPage', [LandingPageController::class, 'addlandingPageView'])->name('landingPage');
});

Route::group(['name' => 'product'], function () {
    Route::get('/product', [ProductController::class, 'Product'])->name('product');
    Route::post('/add-product', [ProductController::class, 'addProduct'])->name('addProduct');
    Route::get('/get-product/{id}', [ProductController::class, 'getProduct'])->name('getProduct');
    Route::post('/delete-product', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
    Route::post('/update-product', [ProductController::class, 'updateProduct'])->name('updateProduct');
});

