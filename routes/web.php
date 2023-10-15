<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HotelController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\PostDec;

Route::get('/', function () {
    return view('Frontend.pages.home')->with('page', '/');
});
Route::get('about', function () {
    return view('Frontend.pages.about') ->with('page', 'about');;
});
Route::get('contact', function () {
    return view('Frontend.pages.contact');
});
Route::get('hotels', function () {
    return view('Frontend.pages.hotels');
});
Route::get('hotel', function () {
    return view('Frontend.pages.myHotel');
});



Route::get('/login', [CustomAuthController::class, 'login']) ->middleware('alreadyLoggedIn');
Route::get('/register', [CustomAuthController::class, 'registration']) ->middleware('alreadyLoggedIn');
Route::post('/register-user', [CustomAuthController::class, 'registerUser'])->name('register-user');
Route::post('/login-user', [CustomAuthController::class, 'loginUser'])->name('login-user');
Route::get('/dashboard', [AdminController::class, 'index'])->middleware('isLoggedIn');
