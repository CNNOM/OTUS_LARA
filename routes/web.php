<?php

use App\Http\Controllers\TourController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TourController::class, 'home']);
Route::get('/tours', [TourController::class, 'index'])->name('tours.index');
Route::get('/tours/{tour}', [TourController::class, 'show'])->name('tours.show');
Route::view('/registration', 'pages.registration');
Route::get('/cart', [TourController::class, 'cart'])->name('cart');
Route::view('/about', 'pages.about');
Route::view('/contacts', 'pages.contacts');
Route::view('/faq', 'pages.faq');
