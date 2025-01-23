<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

// Authentication Routes
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register/employee', [RegisterController::class, 'registerEmployee']);
Route::post('/register/employer', [RegisterController::class, 'registerEmployer']);

// Protected Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout']);
});
