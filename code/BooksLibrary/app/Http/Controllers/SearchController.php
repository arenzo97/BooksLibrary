<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search($column)
    {
        //orders by column and sort type
        //sortBy added to make it case insensitive
        $books = Book::all();
        return view('Library', ['allBooks' => $books]);
    }
}