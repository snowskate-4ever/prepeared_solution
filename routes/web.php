<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::resource('/authors', \App\Http\Controllers\AuthorController::class);
Route::resource('/publishers', \App\Http\Controllers\PublisherController::class);
Route::resource('/books', \App\Http\Controllers\BookController::class);

Route::get('/add_publishers/{id}', [\App\Http\Controllers\BookController::class, 'add_publishers']);
Route::put('/add_publishers/{id}', [\App\Http\Controllers\BookController::class, 'add_publishers_store']);
Route::get('/add_authors/{id}', [\App\Http\Controllers\BookController::class, 'add_authors']);
Route::put('/add_authors/{id}', [\App\Http\Controllers\BookController::class, 'add_authors_store']);
