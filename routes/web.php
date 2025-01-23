<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register/employee', [RegisterController::class, 'registerEmployee'])->name('register.employee');
Route::post('/register/employer', [RegisterController::class, 'registerEmployer'])->name('register.employer');
