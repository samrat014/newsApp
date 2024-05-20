<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    NewsController,
    CommentController,
    Auth\UserController,
};

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

Route::post('/login', [App\Http\Controllers\Auth\UserController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('/logout', [UserController::class, 'logout']);

    Route::get('assign_role_to_user', [App\Http\Controllers\UserController::class, 'assignCategory'])->middleware('admin');

    Route::group(['prefix' => 'news'], function (){
        Route::get('/', [NewsController::class, 'index']);
        Route::post('/', [NewsController::class, 'store']);
        Route::get('/{news}', [NewsController::class, 'show']);
        Route::post('/{news}', [NewsController::class, 'update']);
        Route::delete('/{news}', [NewsController::class, 'destroy']);
    })->middleware('category_admin');

    Route::group(['prefix' => 'comment'], function () {
        // send me news id to add comment to any news post
        Route::post('/{news}', [App\Http\Controllers\CommentController::class, 'store']);
        Route::get('/{news}', [App\Http\Controllers\CommentController::class, 'index']);
        Route::delete('/{news}', [App\Http\Controllers\CommentController::class, 'index']);

        // send me comment id and news id
        Route::post('update/{id}/{comment}', [App\Http\Controllers\CommentController::class, 'update']);
    });

});
