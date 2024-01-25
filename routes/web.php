<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\userController;




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
        Route::get('/export-products', [ProductController::class, 'export'])->name('export-products');
        Route::get('/user-dashboard', [userController::class, 'ProductView'])->name('userDashboard');
        
        Route::get('/addToCart/{productId}', [UserController::class, 'addToCart'])->name('addToCart');
        Route::post('/addToCart/{productId}', [UserController::class, 'addToCart'])->name('addToCart');
        Route::get('/cart/{productId}', [userController::class, 'viewCart'])->name('viewCart');
        
        Route::get('/get-user-product/{id}', [UserController::class, 'getUserProduct'])->name('getUserProduct');
        Route::post('/update-product-user', [UserController::class, 'updateUserProduct'])->name('updateUserProduct');
    });
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



/* Route::get('/dashboard', [userController::class, 'ProductView'])->name('dashboard'); */



