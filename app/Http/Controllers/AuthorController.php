<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AuthorController extends Controller
{
    public function index()
    {
        return Inertia::render('Author/Index', ['authors' => Author::all() ]);
    }
    public function create()
    {
        return Inertia::render('Author/Create');
    }
    public function store(Request $request)
    {
        $author = new Author($request->all());
        $author->save();

        return redirect()->route('authors.index');
    }
    public function edit(Author $author)
    {
        return Inertia::render('Author/Edit', ['author' => $author]);
    }
    public function update(Request $request, Author $author)
    {
        $author->update($request->all());
        return redirect()->route('authors.index');
    }
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->back();
    }
}
