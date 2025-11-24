<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [BookController::class,'index'])->name('books.index');

Route::get('/books/books',[BookController::class,'allBooks'] )->name('books.allBooks');


Route::get('/books/add',[BookController::class,'add'])->name('books.add');

Route::get('/books/edit',[BookController::class,'edit'])->name('books.edit');

Route::get('/books/destroy',[BookController::class,'destroy'])->name('books.destroy');

Route::get('/books/{id}',[BookController::class,'edit'])->name('books.edit');

Route::get('/books/track', [BookController::class,'track'])->name('books.track');

Route::get('/books/{id}',[BookController::class,'about'] )->name('books.about');

Route::post('/dashboard',[BookController::class,'store'] )->name('books.store');