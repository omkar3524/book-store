<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // List all books
    public function index()
    {
        $books = Book::with('category:id,name', 'authors:name')->get();
        // dd($books->toArray());
        return view('home', compact('books'));
    }
}
