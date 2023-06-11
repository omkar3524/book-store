<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category:id,name', 'authors:name')->get();

        return view('books.index', compact('books'));
    }

    public function show($book)
    {
        $book = Book::with('category:id,name', 'authors:name', 'reviews.user:id,name')
            ->withAvg('reviews', 'rating')
            ->findOrFail($book);

        return view('books.show', compact('book'));
    }
}
