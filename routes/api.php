<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [UserController::class, 'register']);
Route::get('/post/{post}', [PostController::class, 'show']);
Route::post('/auth', [UserController::class, 'auth']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/logout', [UserController::class, 'logout']);
    Route::post('/postadd', [PostController::class, 'store']);
    Route::post('/comment/{post}', [CommentController::class, 'store']);
});