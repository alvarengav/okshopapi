<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\PasswordManagerController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
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

    // Route::post('login', 'AuthController@login');
    // Route::post('logout', 'AuthController@logout');
    // Route::post('refresh', 'AuthController@refresh');
    // Route::post('me', 'AuthController@me');

    Route::post('/auth/register', [AuthController::class, 'createUser']);
    Route::post('/auth/login', [AuthController::class, 'loginUser']);
    Route::get('/user', function () {
        return response()->json(auth()->user());
    });

    Route::apiResource('products', ProductController::class);
    Route::post('/products/{product}/image', [ProductController::class, 'uploadImage']);
    Route::apiResource('social-networks', PasswordManagerController::class);

});

// Route::post('/auth/register', [AuthController::class, 'createUser']);
// Route::post('/auth/login', [AuthController::class, 'loginUser']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::middleware('auth:sanctum')->group(function () {
//     Route::apiResource('products', ProductController::class);
//     Route::apiResource('social-networks', PasswordManagerController::class);
// });

// Route::post('/products/{product}/image', [ProductController::class, 'uploadImage']);

// Route::get('/links', function () {
//     return [
//         'url' => url('images/products/'),
//         'base_path' => base_path(),
//         'public_path' => public_path(),
//     ];
// });
