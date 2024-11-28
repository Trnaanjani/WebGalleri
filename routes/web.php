<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Halaman QUEST
Route::get('/galeri', [HomeController::class, 'galeri'])->name('galeri');
Route::get('/agenda', [HomeController::class, 'agenda'])->name('agenda');
Route::get('/informasi', [HomeController::class, 'informasi'])->name('informasi');
Route::get('/', [HomeController::class, 'index'])->name('home');

// Auth Routes
Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');

// Admin Routes
Route::middleware('auth')->group(function() {   
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('posts', PostController::class);
    Route::resource('galleries', GalleryController::class);
    
    Route::post('/images/store', [ImageController::class, 'store']);
    Route::delete('/images/{id}', [ImageController::class, 'destroy']);
    Route::put('/images/{id}', [ImageController::class, 'update'])->name('images.update');

    
    Route::get('/logout', [AuthController::class, 'logout']);
});
