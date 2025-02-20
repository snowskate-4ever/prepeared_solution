<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use App\Http\Classes\BooksRepository;

class BookController extends Controller
{
    public function index()
    {
        $books = new BooksRepository();
        return Inertia::render('Book/Index', ['books' => $books->getAll() ]);
    }

    public function create()
    {
        return Inertia::render('Book/Create');
    }
    public function store(Request $request)
    {
        $book = new Book($request->all());
        $book->save();

        return redirect()->route('books.index');
    }
    public function edit(Book $book)
    {
        return Inertia::render('Book/Edit', ['book' => $book]);
    }
    public function update(Request $request, Book $book)
    {
        $book->update($request->all());
        return redirect()->route('books.index');
    }
    public function destroy(Book $book)
    {
        DB::table('publishers_to_books')
            ->where('book_id', '=', $book->id)
            ->delete();

        DB::table('authors_to_books')
            ->where('book_id', '=', $book->id)
            ->delete();

        $book->delete();
        return redirect()->back();
    }
    public function add_publishers($id)
    {
        $book_repo = new BooksRepository();
        $book = $book_repo->get((int) $id);
        return Inertia::render('Add/Publisher', ['book' => $book, 'publishers' =>  Publisher::all()]);
    }
    public function add_publishers_store($id, Request $request)
    {
        $id = (int) htmlspecialchars($id);

        $deleted = DB::table('publishers_to_books')
            ->where('book_id', '=', $id)
            ->delete();

        foreach ($request->publishers as $publisher) {
            DB::table('publishers_to_books')->insert([
                'book_id' => $id,
                'publisher_id' => (int) htmlspecialchars($publisher),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        return redirect()->route('books.index');
    }

    public function add_authors($id)
    {
        $book_repo = new BooksRepository();
        $book = $book_repo->get((int) $id);
        return Inertia::render('Add/Author', ['book' => $book, 'authors' =>  Author::all()]);
    }
    public function add_authors_store($id, Request $request)
    {
        $id = (int) htmlspecialchars($id);

        $deleted = DB::table('authors_to_books')
            ->where('book_id', '=', $id)
            ->delete();

        foreach ($request->authors as $author) {
            DB::table('authors_to_books')->insert([
                'book_id' => $id,
                'author_id' => (int) htmlspecialchars($author),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        return redirect()->route('books.index');
    }
}
