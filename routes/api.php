<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\IndexController;
use App\Http\Controllers\api\NewsController;
use App\Http\Controllers\api\ContactController;
use App\Http\Controllers\api\TypeController;
use App\Http\Controllers\api\ProductController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/', [IndexController::class, 'index']);
Route::post('/update/{id}', [IndexController::class, 'update']);

Route::prefix('news')->group(function() {
    Route::post('/add', [NewsController::class, 'store']);
    Route::post('/update/{id}', [NewsController::class, 'update']);
    Route::delete('/delete/{id}', [NewsController::class, 'destroy']);
    Route::post('/search/{keyword}', [NewsController::class, 'search']);
});

Route::prefix('contact')->group(function() {
    Route::post('/send', [ContactController::class, 'send']);
    Route::post('/reply', [ContactController::class, 'reply']);
    Route::delete('/delete/{id}', [ContactController::class, 'destroy']);
});

Route::prefix('type')->group(function() {
    Route::post('/add', [TypeController::class, 'store']);
    Route::post('/update', [TypeController::class, 'update']);
    Route::delete('/delete/{id}', [TypeController::class, 'destroy']);
});

Route::prefix('product')->group(function() {
    Route::post('/add', [ProductController::class, 'store']);
    Route::post('/update/{id}', [ProductController::class, 'update']);
    Route::delete('/delete/{id}', [ProductController::class, 'destroy']);
});
