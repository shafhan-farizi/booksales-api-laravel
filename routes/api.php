<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\TransactionController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::apiResource('/books', BookController::class)->only(['index', 'show']);
Route::apiResource('/authors', AuthorController::class)->only(['index', 'show']);
Route::apiResource('/genres', GenreController::class)->only(['index', 'show']);


Route::middleware(['auth:api'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
   
    Route::apiResource('/transactions', TransactionController::class)->only(['store', 'show']);

    Route::middleware(['role:admin'])->group(function () {
        Route::apiResource('/transactions', TransactionController::class)->only(['index', 'update', 'destroy']);
    });
});

Route::apiResource('/authors', AuthorController::class)->only(['store', 'update', 'destroy']);
Route::apiResource('/books', BookController::class)->only(['store', 'update', 'destroy']);
Route::apiResource('/genres', GenreController::class)->only(['store', 'update', 'destroy']);
