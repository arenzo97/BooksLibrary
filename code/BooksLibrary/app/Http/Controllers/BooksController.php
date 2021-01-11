<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{

    public function index()
    {
        $books = Book::all();

        return view('Index', ['allBooks' => $books]);
    }

    public function create()
    {
        return view('create');
    }

    public function store()
    {
        Book::create([
            'title'=>request('title'),
            'author'=>request('author'),
        ]);
        return view('home');
    }
}
