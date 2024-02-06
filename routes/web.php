<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    if (!Auth::check()) { // If not logged in, redirect to login
        return redirect(route('login'));
    }
    return view('home');
})->name('home');

Route::get('/login', function () {
    if (Auth::check()) { // If already logged in, redirect to home
        return redirect(route('home'));
    }
    return view('login');
})->name('login');

Route::get('/register', function () {
    if (Auth::check()) { // If already register, redirect to home
        return redirect(route('home'));
    }
    return view('register');
})->name('register');


Route::post('register-user', [AuthController::class, 'registerUser'])->name('register-user');
Route::post('login-user', [AuthController::class, 'loginUser'])->name('login-user');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
