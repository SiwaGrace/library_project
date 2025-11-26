<?php
// for when i have real users
namespace App\Http\Controllers;

use App\Models\Book;


use Illuminate\Http\Request;

class BorrowController extends Controller
{
  function borrow(Request $request, $bookId)
{
    $book = Book::findOrFail($bookId);

    if (!$book->available) {
        return back()->with('error', 'Book is already borrowed.');
    }

    // Create borrow record
    $borrow = Borrow::create([
        'assignee_name' => null, // since you don't have users yet
        'book_id' => $book->id,
        'borrowed_at' => now(),
        'due_date' => now()->addDays(7),
        'status' => 'borrowed',
    ]);

    // Mark book as unavailable
    $book->available = false;
    $book->save();

    return back()->with('success', 'Book borrowed successfully.');
}

function returnBook($borrowId)
{
    $borrow = Borrow::findOrFail($borrowId);
    $book = $borrow->book;

    // Update borrow record
    $borrow->update([
        'returned_at' => now(),
        'status' => 'returned',
    ]);

    // Mark book as available
    $book->available = true;
    $book->save();

    return back()->with('success', 'Book returned successfully.');
}

}
