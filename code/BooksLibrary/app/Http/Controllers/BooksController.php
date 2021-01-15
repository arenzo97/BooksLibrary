<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{

    // loads Library.blade.php view
    public function index()
    {
        // calls all book records in the database
        $books = Book::all();

        return view('Library', ['books' => $books]);
    }

    public function sortBookList($column)
    {
        // orders by column and sort type
        // sortBy added to make it case insensitive
        $books = Book::orderBy($column,'asc')->get()->sortBy($column, SORT_NATURAL|SORT_FLAG_CASE);

        return view('Library', ['books' => $books]);
    }

    // loads CreateBook.blade.php
    public function create()
    {
        return view('CreateBook');
    }

    // loads EditBook.blade.php
    public function edit(Book $book)
    {
        return view('EditBook', compact('book'));
    }

    // adds book to the database if its a valid input
    public function store()
    {
        Book::create($this->validateRequest());

        // redirects to the book list view
        return redirect('/books');
    }

    // edits book to the database if its a valid input
    public function update(Book $book)
    {
        
        $data = $this->validateRequest();
        $book->update($data);

        
        return redirect('/books');

    }

    // deletes book from the database
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect('/books');
    }
 

    // validates input text:
    // 'title' and 'author' should be required and have a minimum length of 3
    protected function validateRequest()
    {
        return request()->validate([
            'title'=>'required|min:3',
            'author'=>'required|min:3',
        ]);
    }
}