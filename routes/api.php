<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
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

Route::middleware('token')->group(function () {
    Route::apiResource('blogs', BlogController::class);

    Route::scopeBindings()->group(function () {
        Route::apiResource('blogs.posts', PostController::class);
    });

    Route::prefix('posts/{post}')->group(function () {
        Route::post('like', [LikeController::class, 'like']);

        Route::post('comment', [CommentController::class, 'comment']);
    });
});
