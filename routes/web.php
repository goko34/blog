<?php

use App\Http\Controllers\FrontAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontPostController;

// Route::get('/', function () {
//     return view('auths.register');
// })->name('register');
// Route::get('/login', function () {
//     return view('auths.login');
// })->name('login');

// Route::get('/home', [FrontPostController::class, 'home'])->name('home');
Route::get('/home', [FrontPostController::class, 'indexview'])->name('home');
// Route::get('/home', [FrontPostController::class, 'index'])->name('home');

// Route::post('/login', [FrontAuthController::class, 'login'])->name('login.post');
// Route::post('/register', [FrontAuthController::class, 'register'])->name('register.post');

Route::get('/login', [FrontAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [FrontAuthController::class, 'login'])->name('loginpost');
Route::get('/register', [FrontAuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [FrontAuthController::class, 'register'])->name('registerpost');
