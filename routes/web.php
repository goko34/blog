<?php

use App\Http\Controllers\FrontAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontPostController;

Route::get('/', function () {
    return view('auths.login');
});

Route::get('/home', [FrontPostController::class, 'index'])->name('home');


Route::get('/login', [FrontAuthController::class, 'loginview'])->name('login');
Route::get('/register', [FrontAuthController::class, 'registerview'])->name('register');
Route::post('/login', [FrontAuthController::class, 'login'])->name('login.post');
Route::post('/register', [FrontAuthController::class, 'register'])->name('register.post');

