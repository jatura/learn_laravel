<?php

use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group((['prefix' => '/v1']), function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::group((['prefix' => 'product']), function () {
        Route::post('add', [ProductController::class, 'add']);
        Route::get('list', [ProductController::class, 'list']);
    });
    Route::group((['prefix' => 'customer']), function () {
        Route::post('add', [CustomerController::class, 'add']);
        Route::get('list', [CustomerController::class, 'list']);
    });
});
