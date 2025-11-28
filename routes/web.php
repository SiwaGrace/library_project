<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;

// Public
Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
// Form submission
Route::post('/register', [AuthController::class, 'register']);
// Route::post('/login', [AuthController::class, 'login']);

// User routes

// Admin routes
Route::get('/dashboard', [BookController::class,'index'])->name('books.index');

Route::get('/admin/books',[BookController::class,'allBooks'] )->name('books.allBooks');

Route::get('/admin/add',[BookController::class,'add'])->name('books.add');

Route::post('/dashboard',[BookController::class,'store'] )->name('books.store');

Route::get('/admin/edit',[BookController::class,'edit'])->name('books.edit');

Route::get('/admin/track', [BookController::class,'track'])->name('books.track');

Route::delete('/admin/{id}',[BookController::class,'destroy'])->name('books.destroy');

Route::get('/admin/{id}',[BookController::class,'edit'])->name('books.edit');

Route::get('/admin/{id}',[BookController::class,'about'] )->name('books.about');
