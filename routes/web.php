<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\System\SystemProductGroupsController;
use App\Http\Controllers\System\SystemProductsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'web'], function () {
    Auth::routes();
    Route::get('/', [HomeController::class, 'index'])->name("home");
    Route::get('/products/{productGroupId?}', [ProductsController::class, 'index'])->name("products");
    Route::get('/create-order', [OrderController::class, 'index'])->name('order');

    Route::get('ajax/product-groups/search', [SystemProductGroupsController::class, 'ajaxSearch']);

    //System
    Route::prefix('system')->name('system.')->group(function () {
        Route::resource('product-groups',SystemProductGroupsController::class);
        Route::resource('products',SystemProductsController::class);
    });
});
