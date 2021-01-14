<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class DownloadsController extends Controller
{

    public function download($column)
    {
        $books = Book::all();
        $filename = date('Y-m-d-His')."-books-".$column.".csv";
        $handle = fopen($filename,'w+');

        if($column=="all")
        {
          $get_column_headers =  array('title', 'author');
        }

        else if($column=="title"||$column=="author")
        {
            $get_column_headers = array($column);
        }

        fputcsv($handle, $get_column_headers);

        if($column=="all")
        {
            foreach($books as $book)
            {
                fputcsv($handle,array($book['title'],$book['author']));
            }
        }

        else if($column=="title"||$column=="author")
        {
            foreach($books as $book)
            {
                fputcsv($handle, array($book[$column]));
            }
        }
        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
            );
        
        return response()->download($filename,$filename,$headers);
    }

}