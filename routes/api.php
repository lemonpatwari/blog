<?php

use App\Http\Controllers\Api\BlogIndexController;
use App\Http\Controllers\Api\BlogShowController;
use App\Http\Controllers\Api\CommentStoreController;
use App\Http\Controllers\CommentIndexController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::post('login', LoginController::class);
});

Route::middleware(['auth:sanctum'])->group(function () {

    Route::prefix('blogs')->group(function () {
        Route::get('/index', BlogIndexController::class);
    });


    Route::prefix('comment')->group(function () {
        Route::post('/store', CommentStoreController::class);
    });

});

Route::prefix('blogs')->group(function () {
    Route::get('/index', BlogIndexController::class);
    Route::get('/{slug}', BlogShowController::class);
});

Route::prefix('comment')->group(function () {
    Route::get('/{blog_id}', CommentIndexController::class);
});



