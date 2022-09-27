<?php

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', function () {
    return User::get();
});

Route::get('/user/{id}', function ($id) {
    return User::findOrFail($id);
});

Route::get('/products', function () {
    return Product::get();
});

Route::get('/product/{id}', function ($id) {
    return Product::findOrFail($id);
});



