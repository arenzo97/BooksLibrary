<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{

    public function index()
    {
        $books = Book::all();

        return view('Library', ['books' => $books]);
    }

    public function sortBookList($column, $sorttype)
    {
        //orders by column and sort type
        //sortBy added to make it case insensitive
        $books = Book::orderBy($column,$sorttype)->get()->sortBy($column, SORT_NATURAL|SORT_FLAG_CASE);

        return view('Library', ['books' => $books]);
    }

    public function downloadAll()
    {

        $books = Book::all();
        $filename = "books.csv";
        $handle = fopen($filename,'w+');
        fputcsv($handle, array('title', 'author'));

        foreach($books as $book)
        {
            fputcsv($handle, array($book['title'],$book['author']));
        }
        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
            );
        
        return response()->download($filename,'books.csv',$headers);
        
    }
    public function downloadTitle()
    {

        $books = Book::select('title')->get();
        $filename = "books-titles-only.csv";
        $handle = fopen($filename,'w+');
        fputcsv($handle, array('title'));
        
        foreach($books as $book)
        {
            fputcsv($handle, array($book['title']));
        }
        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
            );
        
        return response()->download($filename,'books-titles-only.csv',$headers);
        
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
