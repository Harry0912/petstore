<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//前、後端
Route::get('/', [IndexController::class, 'index']);
Route::get('/control',[IndexController::class, 'show']);

//最新消息
Route::prefix('news')->group(function() {
    Route::get('/table', [NewsController::class, 'table']);
    Route::get('/add', [NewsController::class, 'create']);
    Route::get('/edit/{id}', [NewsController::class, 'edit']);
    Route::get('/list', [NewsController::class, 'index']);
    Route::get('/show/{id}', [NewsController::class, 'show']);
    Route::post('/search/{keyword?}', [NewsController::class, 'search']);
});

//聯絡我們
Route::prefix('contact')->group(function() {
    Route::get('/form', [ContactController::class, 'index']);
    Route::get('/table', [ContactController::class, 'table']);
    Route::get('/show/{id}', [ContactController::class, 'show']);
});

//產品分類
Route::get('/type', [TypeController::class, 'index']);

//產品
Route::prefix('product')->group(function() {
    Route::get('/list/{type_id?}', [ProductController::class, 'index']);
    Route::get('/show/{id}', [ProductController::class, 'show']);
    Route::get('/table', [ProductController::class, 'table']);
    Route::get('/add', [ProductController::class, 'create']);
    Route::get('/edit/{id}', [ProductController::class, 'edit']);
    Route::post('/search/{keyword?}', [ProductController::class, 'search']);
});
