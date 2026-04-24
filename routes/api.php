<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;


Route::apiResource('/books', BookController::class);
Route::apiResource('/authors', AuthorController::class);
Route::apiResource('/genres', GenreController::class);