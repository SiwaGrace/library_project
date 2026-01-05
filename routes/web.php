<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;

// Public
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Authentication routes
Route::middleware('guest')->group(function(){
    Route::get('/register', [AuthController::class, 'showRegister'])->name('auth.register');
Route::get('/login', [AuthController::class, 'showLogin'])->name('auth.login');
// Form submission
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// User routes

// Admin routes

Route::middleware('auth')->controller(BookController::class)->group(function(){
Route::get('/dashboard', 'index')->name('books.index');

Route::get('/admin/books','allBooks' )->name('books.allBooks');

Route::get('/admin/add','add')->name('books.add')->middleware('auth');

Route::post('/dashboard','store' )->name('books.store');

Route::get('/admin/edit','edit')->name('books.edit');

Route::get('/admin/track', 'track')->name('books.track');

Route::delete('/admin/{id}','destroy')->name('books.destroy');

Route::get('/admin/{id}','edit')->name('books.edit');

Route::get('/admin/{id}','about' )->name('books.about');
});

