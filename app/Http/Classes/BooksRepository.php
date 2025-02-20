<?php

namespace App\Http\Classes;

use App\Http\Interfaces\Repository;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class BooksRepository implements Repository
{
    public function getAll()
    {
        $books = Book::all();
        $authors = DB::table('authors_to_books')
            ->join('authors', 'authors.id', '=', 'authors_to_books.author_id')
            ->get();
        $publishers = DB::table('publishers_to_books')
            ->join('publishers', 'publishers.id', '=', 'publishers_to_books.publisher_id')
            ->get();
        foreach ($books as $id => $book) {
            $books[$id]->authors = [];
            $books[$id]->publishers = [];
            foreach ($authors as $author_id => $author) {
                if ($author->book_id == $book->id) {
                    $books[$id]->authors = array_merge($books[$id]->authors, [$author->author_id => $author->name ]);
                }
            }
            foreach ($publishers as $publisher_id => $publisher) {
                if ($publisher->book_id == $book->id) {
                    $books[$id]->publishers = array_merge($books[$id]->publishers, [$publisher->publisher_id => $publisher->name ]);
                }
            }
        }

        return $books;
    }
    public function get($id)
    {
        $book = Book::find($id);

        $book->authors = DB::table('authors_to_books')
            ->join('authors', 'authors.id', '=', 'authors_to_books.author_id')
            ->where('book_id', '=', $id)
            ->get();

        $book->publishers = DB::table('publishers_to_books')
            ->join('publishers', 'publishers.id', '=', 'publishers_to_books.publisher_id')
            ->where('book_id', '=', $id)
            ->get();
        return $book;
    }
}
