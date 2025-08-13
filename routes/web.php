<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\AuthorDashboardController;
use App\Http\Controllers\Auth\AuthorLoginController;
use App\Http\Controllers\MainAuthController;
Route::get('/', function () {
    return view('welcome');
});


Route::resource('books', BookController::class);
Route::resource('authors', AuthorController::class);
Route::resource('libraries', LibraryController::class);



Route::get('author/login', [AuthorLoginController::class, 'showLoginForm'])->name('author.login');
Route::post('author/login', [AuthorLoginController::class, 'login'])->name('author.login.submit');
Route::post('author/logout', [AuthorLoginController::class, 'logout'])->name('author.logout');


Route::get('/author/dashboard', function() {
    return 'مرحبا بك في لوحة تحكم المؤلف';
})->middleware('auth:author');


Route::get('/author/dashboard', [AuthorDashboardController::class, 'index'])
    ->name('author.dashboard')
    ->middleware('auth:author');



    Route::get('login', function () {
    return redirect()->route('author.login');
})->name('login');

Route::get('/', [MainAuthController::class, 'showLogin'])->name('main.login');


Route::post('/login', [MainAuthController::class, 'login'])->name('main.login.post');



