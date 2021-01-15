<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class DownloadsController extends Controller
{

    // depending on which column is selected (all, title or author)
    // allows user to download as a CSV
    public function downloadCSV($column)
    {
        
        $books = Book::all();

        // format the filenames. Example:
        // '2021-01-15-091500-books-<COLUMN SELECTION>.csv'
        $filename = date('Y-m-d-His')."-books-".$column.".csv";

        // writes to a new CSV file
        $handle = fopen($filename,'w+');
        
        // if route is '/books/download/all' sets the first columns (header) with 'title' and 'author'
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
            // if route is '/books/download/csv/all' then get both title and author columns for each book
            foreach($books as $book)
            {
                fputcsv($handle,array($book['title'],$book['author']));
            }
        }

        else if($column=="title"||$column=="author")
        {
            // otherwise get only the data from the selected column
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

    // depending on which column is selected (all, title or author)
    // allows user to download as an XML
    public function downloadXML($column)
    {
        $books = Book::all();

        // format the filenames. Example:
        // '2021-01-15-091500-books-<COLUMN SELECTION>.xml'
        $filename = date('Y-m-d-His')."-books-".$column.".xml";

        // opens a new text handler, writes to a file using the filename
        $handle = fopen($filename,'w+');

        // creates a new $xml variable to append strings to
        $xml="<library>\n";

        if($column=="all")
        {
            foreach($books as $book)
            {
                // if route is '/books/download/xml/all' then get both title and author columns for each book
                // appends each column with the title and author tags on each side
                $xml.="\t<book>\n";
                $xml.="\t\t<title>".$book['title']."<title/>\n";
                $xml.="\t\t<author>".$book['author']."<author/>\n";
                $xml.="\t</book>\n";
            }
        }
        
        else if($column=="title"||$column=="author")
        {
            
            foreach($books as $book)
            {
                $xml.="\t<book>\n";
                $xml.="\t\t<".$column.">".$book[$column]."<".$column."/>\n";
                $xml.="\t</book>\n";
            }
            
        }
        
        $xml.="</library>";

        // writes $xml variable to the text handler
        fwrite($handle,$xml);
        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/xml',
            );
        
        return response()->download($filename,$filename,$headers);
    }

}