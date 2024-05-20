<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    NewsController,
    CommentController,
    UserController,
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

    Route::get('/logout', [App\Http\Controllers\UserController::class, 'logout']);

    Route::post('assign_role_to_user', [UserController::class, 'assignCategory'])->middleware('admin');


    Route::post('category', [UserController::class, 'storeCategory'])->middleware('admin');


    Route::group(['prefix' => 'category' ], function (){
        Route::get('/', [UserController::class, 'indexCategory']);
        Route::post('/', [UserController::class, 'storeCategory']);
        Route::delete('/{news}', [UserController::class, 'destroyCategory']);
    });


    Route::group(['prefix' => 'news' ], function (){
        Route::get('/', [NewsController::class, 'index']);
        Route::post('/', [NewsController::class, 'store']);
        Route::get('/{news}', [NewsController::class, 'show']);
        Route::post('/{news}', [NewsController::class, 'update']);
        Route::delete('/{news}', [NewsController::class, 'destroy']);
    });

    Route::group(['prefix' => 'comment'], function () {
        // send me news id to add comment to any news post
        Route::post('/{news}', [CommentController::class, 'store']);
        Route::get('/{news}', [CommentController::class, 'index']);
        Route::delete('/{news}', [CommentController::class, 'index']);

        // send me comment id and news id
        Route::post('update/{id}/{comment}', [CommentController::class, 'update']);
    });

});
