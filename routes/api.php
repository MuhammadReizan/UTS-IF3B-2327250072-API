<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/film', [FilmController::class, 'index']);
Route::post('/film/create', [FilmController::class, 'store']);
Route::get('/film/{id}', [FilmController::class, 'show']);
