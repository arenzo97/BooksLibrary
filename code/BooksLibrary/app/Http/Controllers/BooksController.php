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

    public function sortBookList($column, $sorttype)
    {
        //orders by column and sort type
        //sortBy added to make it case insensitive
        $books = Book::orderBy($column,$sorttype)->get()->sortBy($column, SORT_NATURAL|SORT_FLAG_CASE);

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
    public function search(Request $request)
    {
        $query = $request->input('query');
        $books = Book::where('title', 'LIKE','%'.$query.'%');
        echo "Hello";
        return view('Library', ['allBooks' => $books]);
    }
    protected function validateRequest()
    {
        return request()->validate([
            'title'=>'required',
            'author'=>'required',
        ]);
    }
}
