<?php

namespace App\Http\Controllers;

use App\Models\Book;

use Illuminate\Http\Request;

class BookController extends Controller
{
    function index() {
        $books=Book::all();
        $length = Book::count();
        $availableCount = Book::where('available', true)->count();
        $borrowedBooks = Book::where('available', false)->count();

    return view('books.index',['books'=>$books,'length'=>$length,'availableCount'=>$availableCount,'borrowedBooks'=>$borrowedBooks]);
}

    function allBooks(){
 $books=Book::orderBy('created_at','desc')->get();
         return view('books.books',['books'=>$books]);
    }

    function about($id) {
    return view('books.about',["id"=>$id]);
}

function edit() {
   return view('books.edit');
}

function add() {
   return view('books.add');
}

function track() {
    return view('books.track');
}

}
