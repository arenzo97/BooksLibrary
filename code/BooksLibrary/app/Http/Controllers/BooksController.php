<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{

    public function index()
    {
        $books = Book::all();

        return view('Library', ['allBooks' => $books]);
    }

    public function create()
    {
        return view('CreateBook');
    }

    public function edit(Book $book)
    {
        return view('EditBook', compact('book'));
    }


    public function store()
    {
        Book::create($this->validateRequest());
        return redirect('/books');
    }

    public function update(Book $book)
    {
        
        $data = $this->validateRequest();
        $book->update($data);
        return redirect('/books');

    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect('/books');
    }

    protected function validateRequest()
    {
        return request()->validate([
            'title'=>'required',
            'author'=>'required',
        ]);
    }
}
