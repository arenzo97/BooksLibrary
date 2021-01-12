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
        $data = request()->validate([
            'title'=>'required',
            'author'=>'required',
        ]);
        Book::create($data);
        return redirect('/books');
    }

    public function update(Book $book)
    {
        $data = request()->validate([
            'title'=>'required',
            'author'=>'required',
        ]);
        
        $book->update($data);
        return redirect('/books');

    }
}
