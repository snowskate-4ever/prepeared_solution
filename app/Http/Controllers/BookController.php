<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BookController extends Controller
{
    public function index()
    {
        return Inertia::render('Book/Index', ['books' => Book::all() ]);
    }
    public function create()
    {
        return Inertia::render('Book/Create', ['authors' => Author::all(), 'publishers' => Publisher::all() ]);
    }
    public function store(Request $request)
    {
        $book = new Book($request->all());
        $book->save();

        return redirect()->route('books.index');
    }
    public function edit(Book $book)
    {
        return Inertia::render('Book/Edit', ['books' => $book]);
    }
    public function update(Request $request, Book $book)
    {
        $book->update($request->all());
        return redirect()->route('books.index');
    }
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->back();
    }
}
