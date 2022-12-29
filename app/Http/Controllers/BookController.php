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
        $validated = $request->validate([
            'book_code' => 'required|unique:books|max:255',
            'title' => 'required|max:255'
        ]);

        $newName = '';

        if ($request->file('imagecover')) {
            $extension = $request->file('imagecover')->getClientOriginalExtension();
            $newName = $request->title . '-' . now()->timestamp . '.' . $extension;
            $request->file('imagecover')->storeAs('cover', $newName);
        }

        $request['cover'] = $newName;
        $book = Book::create($request->all());
        return redirect('books')->with('status', 'Add new book successfully!');
    }
}
