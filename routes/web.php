<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
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

// Route::resource('movie', MovieController::class);

Route::resource('categories', CategoryController::class);

Route::get('/home', [MovieController::class, 'homepage']);

Route::get('detailmovie/{id}/{slug}', [MovieController::class, 'detail']);

