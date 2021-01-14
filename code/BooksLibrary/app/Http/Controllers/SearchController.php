<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $books = Book::where('title', 'LIKE','%'.$query.'%')->get();

        return view('Library', ['books' => $books]);
    }
}