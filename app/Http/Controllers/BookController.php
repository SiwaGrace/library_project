<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Borrow;


use Illuminate\Http\Request;

class BookController extends Controller
{
    function index() {
        $books=Book::all();
        $categories=Category::all();
        $length = Book::count();
        $catlength = Category::count();
        $availableCount = Book::where('available', true)->count();
        $borrowedBooks = Book::where('available', false)->count();
         $fourbooks=Book::latest()->take(5)->get();

    return view('admin.index',['books'=>$books,'length'=>$length,'availableCount'=>$availableCount,'borrowedBooks'=>$borrowedBooks,'categoryLength'=>$catlength,'fourbooks'=>$fourbooks]);
}

    function allBooks(){
 $books=Book::orderBy('created_at','desc')->get();
         return view('admin.books',['books'=>$books]);
    }

    function about($id) {
         $book = Book::with('category')->findOrFail($id);
    return view('admin.about',["id"=>$id], compact('book'));
}

function edit() {
   return view('admin.edit');
}

function destroy($id) {
    $book = Book::findOrFail($id);
     // Delete the book
        $book->delete();
    // Redirect back with a success message
        return redirect()->route('books.allBooks')
                         ->with('success', 'Book deleted successfully!');
}

function add() {
    $category = Category::all();
   return view('admin.add', ['categories'=>$category]);
}

function store(Request $request) {
    // /books
    $validated = $request->validate([
        'title'=>'required|
        string|max:255',
        'author'=>'required|
        string|max:255',
        'description' => 'required|string|min:10|max:1000',
        'category_id' => 'required|exists:categories,id',
      ]);
    Book::create($validated);

      return redirect()->route('books.index');
    //   ->with('success','Ninja created!');
}


function track() {
    $records = Borrow::with('book')
        ->orderBy('borrowed_at', 'desc')
        ->paginate(10);

    return view('admin.track', ['records' => $records]);
}


// function track() {
//     $records = Borrow::with(['user', 'book'])
//         ->orderBy('borrowed_at', 'desc')
//         ->paginate(10);

//     return view('books.track', ['records' => $records]);
// }

}
