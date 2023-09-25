<?php

use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});
Route::get('search', function () {
    return view('pages.search');
});
Route::get('contact', function () {
    return view('pages.contact');
});
Route::get('hotels', function () {
    return view('pages.hotels');
});
Route::get('hotel', function () {
    return view('pages.myHotel');
});

Route::get('/login', [CustomAuthController::class, 'login']) ->middleware('alreadyLoggedIn');
Route::get('/register', [CustomAuthController::class, 'registration']) ->middleware('alreadyLoggedIn');
Route::post('/register-user', [CustomAuthController::class, 'registerUser'])->name('register-user');
Route::post('/login-user', [CustomAuthController::class, 'loginUser'])->name('login-user');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('isLoggedIn');
// // Route::post('/save', [UserController::class, 'save']);