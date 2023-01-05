<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;  //外部にあるPostControllerクラスをインポート。
use App\Http\Controllers\TagController;  //外部にあるPostControllerクラスをインポート。

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

Route::get('/', [ReviewController::class, 'index']);   

Route::get('/tags/index', [TagController::class, 'index']);   

Route::get('/reviews/create', [ReviewController::class, 'create']);

Route::get('/tags/create', [TagController::class, 'create']);

Route::post('/reviews', [ReviewController::class, 'store']);

Route::post('/tags', [TagController::class, 'store']);

Route::get('/reviews/{review}', [ReviewController::class ,'show']);

Route::get('/tags/{tag}', [TagController::class ,'show']);


