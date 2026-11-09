<?php

use App\Http\Controllers\TourController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.main');
Route::get('/tours', [TourController::class, 'index'])->name('tours.index');
Route::view('/registration', 'pages.registration');
Route::view('/cart', 'pages.cart');
