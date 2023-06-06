<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\PasswordManagerController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group([
    'middleware' => 'api',
], function ($router) {

    Route::post('/auth/register', [AuthController::class, 'createUser']);
    Route::post('/auth/login', [AuthController::class, 'loginUser']);
    Route::get('/user', function () {
        return response()->json(auth()->user());
    });

    Route::apiResource('products', ProductController::class);
    Route::post('/products/{product}/image', [ProductController::class, 'uploadImage']);
    Route::apiResource('social-networks', PasswordManagerController::class);

});
