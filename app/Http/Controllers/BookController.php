<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::all();
        return view('books', ['books' => $books]);
    }

    public function add()
    {
        return view('book-add');
    }

    public function store(Request $request)
    {
        $book = Book::create($request->all());
        return redirect('books')->with('status', 'Add new book successfully!');
    }
}
