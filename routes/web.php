<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

// Route::group(['prefix' => 'products'], function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/newproduct', [ProductController::class, 'newProduct'])->name('newproduct');
    Route::post('/createproduct', [ProductController::class, 'createProduct']);
    // Route::post('/add_product', [ProductController::class, 'addProduct'])->name('products.add');
// });