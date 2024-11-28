<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\GalleryController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HomeController;



Route::get('login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);


Route::prefix('users')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [UserController::class, 'index']); // Menampilkan semua pengguna
    Route::post('/', [UserController::class, 'store']); // Menambah pengguna baru
    Route::get('/{id}', [UserController::class, 'show']); // Menampilkan detail pengguna berdasarkan ID
    Route::put('/{id}', [UserController::class, 'update']); // Mengupdate data pengguna
    Route::delete('/{id}', [UserController::class, 'destroy']); // Menghapus data pengguna
});

Route::prefix('categories')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [CategoryController::class, 'index']); // Menampilkan semua kategori
    Route::post('/', [CategoryController::class, 'store']); // Menambah kategori baru
    Route::get('/{id}', [CategoryController::class, 'show']); // Menampilkan kategori berdasarkan ID
    Route::put('/{id}', [CategoryController::class, 'update']); // Mengupdate kategori
    Route::delete('/{id}', [CategoryController::class, 'destroy']); // Menghapus kategori
});

Route::prefix('posts')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [PostController::class, 'index']); // Menampilkan semua post
    Route::post('/', [PostController::class, 'store']); // Menambah post baru
    Route::get('/{id}', [PostController::class, 'show']); // Menampilkan post berdasarkan ID
    Route::put('/{id}', [PostController::class, 'update']); // Mengupdate post
    Route::delete('/{id}', [PostController::class, 'destroy']); // Menghapus post
});

Route::prefix('galleries')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [GalleryController::class, 'index']); // Menampilkan semua galeri
    Route::post('/', [GalleryController::class, 'store']); // Menambah galeri baru
    Route::get('/{id}', [GalleryController::class, 'show']); // Menampilkan galeri berdasarkan ID
    Route::put('/{id}', [GalleryController::class, 'update']); // Mengupdate galeri
    Route::delete('/{id}', [GalleryController::class, 'destroy']); // Menghapus galeri
});

Route::prefix('images')->middleware('auth:sanctum')->group(function () {
    Route::post('/', [ImageController::class, 'store']); // Meng-upload foto
    Route::get('/', [ImageController::class, 'index']); 
    Route::delete('/{id}', [ImageController::class, 'destroy']); // Menghapus foto berdasarkan ID
});


// Route API untuk Home (tanpa auth)
Route::get('/posts/category/{id}', [PostController::class, 'getByCategory']);
Route::get('/posts', [PostController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/gallery', [HomeController::class, 'getGaleri']);
Route::get('/agenda', [HomeController::class, 'getAgenda']);
Route::get('/informasi', [HomeController::class, 'getInformasi']);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

