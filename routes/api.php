<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IngredientController;
use App\Http\Middleware\JwtMiddleware;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::middleware('auth:api')->get('/me', [AuthController::class, 'me']);

Route::middleware(JwtMiddleware::class)->group(function () {
    Route::apiResource('ingredients', IngredientController::class);
});
