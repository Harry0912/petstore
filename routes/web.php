<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContactController;

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
});

//聯絡我們
Route::prefix('contact')->group(function() {
    Route::get('/form', [ContactController::class, 'index']);
    Route::get('/table', [ContactController::class, 'table']);
    Route::get('/show/{id}', [ContactController::class, 'show']);
});
