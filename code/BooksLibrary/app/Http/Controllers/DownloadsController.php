<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class DownloadsController extends Controller
{

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

    public function downloadAuthor()
    {

        $books = Book::select('author')->get();
        $filename = "books-authors-only.csv";
        $handle = fopen($filename,'w+');
        fputcsv($handle, array('author'));
        
        foreach($books as $book)
        {
            fputcsv($handle, array($book['author']));
        }
        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
            );
        
        return response()->download($filename,'books-authors-only.csv',$headers);
        
    }
}