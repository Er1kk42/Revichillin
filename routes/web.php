<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('start');
})->name('start');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('loginVerify');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/produkty', function () {
    return view('produkty');
})->name('produkty');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/info', function () {
    return view('info');
})->name('info');
