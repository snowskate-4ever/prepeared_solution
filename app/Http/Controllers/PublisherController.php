<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PublisherController extends Controller
{
    public function index()
    {
        return Inertia::render('Publisher/Index', ['publishers' => Publisher::all() ]);
    }
    public function create()
    {
        return Inertia::render('Publisher/Create');
    }
    public function store(Request $request)
    {

        $publisher = new Publisher($request->all());
        $publisher->save();

        return redirect()->route('publishers.index');
    }
    public function edit(Publisher $publisher)
    {
        return Inertia::render('Publisher/Edit', ['publisher' => $publisher]);
    }
    public function update(Request $request, Publisher $publisher)
    {
        $publisher->update($request->all());
        return redirect()->route('publishers.index');
    }
    public function destroy(Publisher $publisher)
    {
        $publisher->delete();
        return redirect()->back();
    }
}
