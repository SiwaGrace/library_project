<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;

// Public
Route::get('/', fn() => view('welcome'))->name('welcome');

// Guest-only auth routes
Route::middleware('guest')->group(function(){
    Route::get('/register', [AuthController::class, 'showRegister'])->name('auth.register');
    Route::get('/login', [AuthController::class, 'showLogin'])->name('auth.login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin-only routes
Route::middleware(['auth','admin'])->controller(BookController::class)->group(function(){
    Route::get('/admin', 'index')->name('books.index');
    Route::get('/admin/books','allBooks')->name('books.admin.allBooks');
    Route::get('/admin/add','add')->name('books.add');
    Route::post('/admin/store','store')->name('books.store');
    Route::get('/admin/{id}/edit','edit')->name('books.edit');
    Route::get('/admin/{id}/about','about')->name('books.about');
    Route::get('/admin/track', 'track')->name('books.track');
    Route::delete('/admin/{id}','destroy')->name('books.destroy');
});

// Authenticated user routes (normal users)
Route::middleware(['auth'])->controller(BookController::class)->group(function () {
    Route::get('/books','allBooks')->name('books.user.allBooks'); // read-only for users
    Route::get('/dashboard', 'index')->name('dashboard'); // user dashboard
});

