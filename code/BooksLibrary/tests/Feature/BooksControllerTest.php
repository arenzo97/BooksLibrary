<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Book;
use Tests\TestCase;

class BooksControllerTest extends TestCase
{
    use RefreshDatabase;
    
    //Add book tests
    /** @test */
    public function add_book_to_books_table()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/books/add', [
            'title' => 'An Untitled Book',
            'author' => 'John Doe',
        ]);
        
        $uri = '/books';
        $response->assertRedirect($uri);

        $this->assertCount(1, Book::all());
    }

    /** @test */
    public function validate_title()
    {
        $response = $this->post('/books/add', [
            'title' => '',
            'author' => 'John Doe',
        ]);
        
        $response->assertSessionHasErrors('title');
    }

     /** @test */
     public function validate_author()
     {
         $response = $this->post('/books/add', [
             'title' => 'An Untitled Book',
             'author' => '',
         ]);
         
         $response->assertSessionHasErrors('author');
     }

    //Update/edit existing book tests
    /** @test */
    public function a_book_can_be_updated()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/books/add', [
            'title' => 'An Untitled Book',
            'author' => 'John Doe',
        ]);

        $book = Book::first();
        $response = $this->patch('/books/update/' . $book->id,[
            'title' => 'New Title',
            'author' => 'New Author',
        ]);
        
        $uri = '/books';
        $response->assertRedirect($uri);
        
        $this->assertEquals('New Title', Book::first()->title);
        $this->assertEquals('New Author', Book::first()->author);
    }

    //Delete book tests
    /** @test */
    public function delete_book_from_books_table()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/books/add', [
            'title' => 'An Untitled Book',
            'author' => 'John Doe',
        ]);

        $book = Book::first();
        $response = $this->delete('/books/delete/' . $book->id);
        
        $uri = '/books';
        $response->assertRedirect($uri);

        $this->assertCount(0, Book::all());
    }
    
     //Book list tests
    /** @test */
    public function books_table_is_empty()
    {
        $this->assertCount(0, Book::all());
    }

    /** @test */
    public function sort_book_list_by_title_asc()
    {
        $this->withoutExceptionHandling();
        $correctOrder = ['A1B','B-1B','B2B'];

        $this->post('/books/add', [
            'title' => 'A1B',
            'author' => '1',
        ]);
        $this->post('/books/add', [
            'title' => 'B2B',
            'author' => '3',
        ]);
        $this->post('/books/add', [
            'title' => 'B-1B',
            'author' => '2',
        ]);

        $testOrder = $this->get('/books/title/asc');

        
        $uri = '/books';
        $response->assertRedirect($uri);

        $this->assertSame($correctOrder,$testOrder);
    }

    
    /*public function sort_book_list_by_title_desc()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/books/add', [
            'title' => 'An Untitled Book',
            'author' => 'John Doe',
        ]);
        
        $uri = '/books';
        $response->assertRedirect($uri);

        $this->assertCount(1, Book::all());
    }*/
}
