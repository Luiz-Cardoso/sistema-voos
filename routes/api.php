<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VooController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/voos', [VooController::class, 'index']);
    Route::post('/voos', [VooController::class, 'store']);
    Route::get('/voos/{id}', [VooController::class, 'show']);
    Route::put('/voos/{id}', [VooController::class, 'update']);
    Route::delete('/voos/{id}', [VooController::class, 'destroy']);
});