<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\BooksController;
use App\Models\Book;
use Tests\TestCase;


class SearchControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function search_for_book_title()
    {
        // adds books
        $this->withoutExceptionHandling();
        $response = $this->post('/books/add', [
            'title' => 'A Different Book',
            'author' => 'Jane Mary',
        ]);
        $response = $this->post('/books/add', [
            'title' => 'An Untitled Book',
            'author' => 'John Doe',
        ]);

        $response = $this->post('/books/add', [
            'title' => 'Not the Same Book',
            'author' => 'Jane K. Mary',
        ]);
        
        // gets URL with "Untitled" in the query
        $query = '/books/search?query=Untitled';
        $response = $this->get($query);
        
        // passes if only 'An Untitled Book' is found on view
        $response->assertSeeText('An Untitled Book');
        $response->assertDontSeeText('Not the Same Book', $escaped = true);
        $response->assertDontSeeText('A Different Book', $escaped = true);
        
       
    }

     /** @test */
     public function search_for_book_author()
     {
         // adds books
         $this->withoutExceptionHandling();
         $response = $this->post('/books/add', [
             'title' => 'A Different Book',
             'author' => 'Jane Mary',
         ]);
         $response = $this->post('/books/add', [
             'title' => 'An Untitled Book',
             'author' => 'John Doe',
         ]);
 
         $response = $this->post('/books/add', [
             'title' => 'Not the Same Book',
             'author' => 'Jane K. Mary',
         ]);
         
         // gets URL with "John" in the query
         $query = '/books/search?query=John';
         $response = $this->get($query);
     
         // passes if only 'An Untitled Book' is found on view
         $response->assertSeeText('An Untitled Book');
         $response->assertDontSeeText('Not the Same Book', $escaped = true);
         $response->assertDontSeeText('A Different Book', $escaped = true);
         
        
     }



}