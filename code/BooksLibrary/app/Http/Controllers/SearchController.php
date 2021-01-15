<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $request -> validate([
            'query'=>'required|min:3',
            
        ]);
        $query = $request->input('query');
        $books = Book::where('title', 'LIKE','%'.$query.'%')
                ->orWhere('author', 'LIKE','%'.$query.'%')
                ->get();

        return view('Library', ['books' => $books]);
    }
}