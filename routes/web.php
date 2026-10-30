<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\ProductController;
use App\Models\User;
use Filament\Pages\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('pages.main');
// });
// Route::get('/auth', function () {
//     return view('pages.auth');
// })->name('login');
Route::get('/tours', [TourController::class, 'index'])->name('tours.index');

// Route::get('/Hello/', function () {
//     return 'Hello World!';
// });

// Route::view(
//     '/test/',
//     'test',
//     [
//         'name' => request('name', 'Anna'),
//         'test' => request('test', '<br>dadas'),
//     ]
// );



// Route::get('/', function () {
//     return 'Добро пожаловать на мой сайт!';
// });

// Route::get('/', function () {
//     return "dfdsfa";
// });

// Route::get('/', function () {

//     return 'Hello World';
// });


// Route::get('/about', function () {
//     return 'Меня зовут [твоё имя]. Я изучаю Laravel.';
// });


// Route::view('/contacts', 'pages.contacts');


// Route::get('/posts', function () {
//     return 'GET';
// });
// Route::post('/posts', function () {
//     return 'POST';
// });
// Route::put('/posts/{id}', function ($id) {
//     return 'PUT' . $id;
// });
// Route::delete('/posts/{id}', function ($id) {
//     return 'DELETE ' . $id;
// });


// Route::get('/hello/{name}', function ($name) {
//     return "Привет " . $name;
// });



// Route::get('/product/{category}/{id}', function ($category, $id) {
//     return "product " . $category . " " . $id;
// });



// // Route::get('/user/{id}', function ($id) {
// //     return $id;
// // })->name('user.show');

// // Route::name('admin.')->group(function () {
// //     Route::get('/admin', function () {
// //         return 'Admin';
// //     })->name('index');

// //     Route::get('/admin/users', function () {
// //         return 'Users';
// //     })->name('users');

// //     Route::get('/admin/settings', function () {
// //         return 'Settings';
// //     })->name('settings');
// // });

// Route::get('/user/{id}', function ($id) {
//     return $id;
// })->whereNumber('id')->name('user.show');

// Route::middleware('auth')->group(function () {
//     Route::view('/dashboard', 'pages.dashboard')->name('dashboard');

//     Route::get('/profile/{name?}', function ($name = null) {
//         return $name ? 'привет ' . $name : 'Гость';
//     })->name('profile');

//     Route::get('/settings', function () {
//         return 'settings';
//     })->name('settings');
// });


// Route::get('/category/{id}', function ($id) {
//     return $id;
// })->whereAlpha('id')->where('id', '[a-z]+')->name('category.show');


// Route::get('/post/{id}/{sluga}', function ($id, $sluga) {
//     return '/post/{' . $id . '}/{' . $sluga . '}';
// })->whereNumber('id')->where('slug', '[A-Za-z0-9-]+');


// //prefix
// // Route::prefix('admin')->name('admin.')->group(function () {
// //     Route::get('/dashboard', function () {
// //         return 'dashboard';
// //     })->name('dashboard');

// //     Route::get('/users', function () {
// //         return 'users';
// //     })->name('users');

// //     Route::get('/posts', function () {
// //         return 'posts';
// //     })->name('posts');
// // });



Route::get('/products', [ProductController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/contact', [ContactController::class, 'show']);
Route::view('/faq', 'pages.faq');

Route::get('/users/{id}/', [ProductController::class, 'show'])->whereNumber('id');
