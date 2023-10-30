<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ShowHotelController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\PostDec;

Route::get('/', function () {
    return view('Frontend.pages.home')->with('page', '/');
});
Route::get('about', function () {
    return view('Frontend.pages.about') ->with('page', 'about');
});
Route::get('contact', [ContactController::class, 'index']);
Route::post('send', [ContactController::class, 'send']);

Route::get('hotels', [ShowHotelController::class, 'index']);

Route::get('hotel', function () {
    return view('Frontend.pages.myHotel');
});
Route::get('booking', function () {
    return view('Frontend.pages.booking');
});



Route::get('/login', [CustomAuthController::class, 'login']) ->middleware('alreadyLoggedIn');
Route::get('/register', [CustomAuthController::class, 'register']) ->middleware('alreadyLoggedIn');
Route::post('/register-user', [CustomAuthController::class, 'registerUser'])->name('register-user');
Route::post('/login-user', [CustomAuthController::class, 'loginUser'])->name('login-user');
// Route::get('/dashboard', [CustomAuthController::class, 'index']);



Route::get('dashboard', [HotelController::class, 'index']);
Route::get('create', [HotelController::class, 'create']);
Route::post('store', [HotelController::class, 'store']);
Route::get('edit/{id}', [HotelController::class, 'edit']);
Route::put('update/{id}', [HotelController::class, 'update']);
Route::get('delete/{id}', [HotelController::class, 'destroy']);

Route::get('data', [CityController::class, 'index']);