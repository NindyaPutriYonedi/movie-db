<?php

use App\Models\Category;
use App\Http\Middleware\RoleAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/movie', function () {
//     return view('movie');
// });

// Route::get('/movies', [MovieController::class, 'index']);


// Route::get('/movie',[MovieController::class,'create']);
// Route::resource('movie', MovieController::class);

// Route::resource('/kategori', CategoryController::class);

// Route::get('/home', function () {
//     return view('layouts.home');

Route::resource('movie', MovieController::class)->middleware('auth');

Route::resource('categories', CategoryController::class);

Route::get('/home', [MovieController::class, 'homepage']);

Route::get('detailmovie/{id}/{slug}', [MovieController::class, 'detail']);

Route::get('create-movie', [MovieController::class, 'createMovie'])->name('createMovies')->middleware('auth');

Route::middleware(['auth', RoleAdmin::class])->group(function () {
    Route::get('/movie/{movie}/edit', [MovieController::class, 'edit'])->name('movie.edit');
    Route::put('/movie/{movie}', [MovieController::class, 'update'])->name('movie.update');
});

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



