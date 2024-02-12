<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    if (!Auth::check()) { // If not logged in, redirect to login
        return redirect(route('login'));
    }
    return view('home');
});

Route::get('/login', function () {
    if (Auth::check()) { // If already logged in, redirect to home
        return redirect(route('/'));
    }
    return view('login');
});

Route::get('/register', function () {
    if (Auth::check()) { // If already register, redirect to home
        return redirect(route('/'));
    }
    return view('register');
});


Route::post('register-user', [AuthController::class, 'registerUser'])->name('register-user');
Route::post('login-user', [AuthController::class, 'loginUser'])->name('login-user');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('add-activity', [ActivityController::class, 'addActivity'])->name('add-activity');
Route::get('/', [ActivityController::class, 'getDailyActivities'])->name('activities');

