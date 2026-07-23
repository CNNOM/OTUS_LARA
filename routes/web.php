<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.main');
});
Route::get('/auth', function () {
    return view('pages.auth');
});
Route::get('tours', function () {
    return view('pages.tours');
});

Route::get('/Hello/', function () {
    return 'Hello World!';
});

Route::view(
    '/test/',
    'test',
    [
        'name' => request('name', 'Anna'),
        'test' => request('test', '<br>dadas'),
    ]
);

