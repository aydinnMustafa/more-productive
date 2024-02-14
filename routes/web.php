<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlansController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    if (Auth::check()) { // If already logged in, redirect to home
        return redirect('/');
    }
    return view('login');
})->name('login');

Route::get('/register', function () {
    if (Auth::check()) { // If already register, redirect to home
        return redirect('/');
    }
    return view('register');
})->name('register');


Route::post('register-user', [AuthController::class, 'registerUser'])->name('register-user');
Route::post('login-user', [AuthController::class, 'loginUser'])->name('login-user');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/myplans', function () {
        return view('myplans');
    });

    Route::get('/', function(){
        $dailyActivities = app(ActivityController::class)->getDailyActivities();
        $getZenQuote = app(ActivityController::class)->getZenQuote();
        return view('home', ['activities' => $dailyActivities, 'quote' => $getZenQuote]);
    });
});

Route::post('add-activity', [ActivityController::class, 'addActivity'])->name('add-activity');


Route::post('set-goal', [PlansController::class, 'setGoal'])->name('set-goal');

