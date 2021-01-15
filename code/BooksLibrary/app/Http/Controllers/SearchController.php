<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function search(Request $request)
    {

        // search query requires an entry and > 3 characters
        $request -> validate([
            'query'=>'required|min:3',
            
        ]);
        $query = $request->input('query');

        // search query looks at both title and author columns
        // gets books where title or author are LIKE the query, wrapped around wildcards
        $books = Book::where('title', 'LIKE','%'.$query.'%')
                ->orWhere('author', 'LIKE','%'.$query.'%')
                ->get();

        return view('Library', ['books' => $books]);
    }
}