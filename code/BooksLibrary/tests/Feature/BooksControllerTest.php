<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\BooksController;
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
        
        // passes if redirects to '/books' (library view)
        $uri = '/books';
        $response->assertRedirect($uri);
        
        // passes if there is 1 Book object found
        $this->assertCount(1, Book::all());
    }

    // Validation tests: prevents user from adding empty data
    // or inputs below minimum number of characters
    /** @test */
    public function validate_title_has_value()
    {
        $response = $this->post('/books/add', [
            'title' => '',
            'author' => 'John Doe',
        ]);

        // passes if has errors
        $response->assertSessionHasErrors('title');
    } 
    
    /** @test */
    public function validate_title_has_more_than_three_characters()
    {
        $response = $this->post('/books/add', [
            'title' => 'Aa',
            'author' => 'John Doe',
        ]);

        // passes if has errors
        $response->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_author_has_value()
    {
        $response = $this->post('/books/add', [
            'title' => 'An Untitled Book',
            'author' => '',
        ]);

        // passes if has errors
        $response->assertSessionHasErrors('author');
    }
    
    /** @test */
    public function validate_author_has_more_than_three_characters()
    {

        $response = $this->post('/books/add', [
            'title' => 'An Untitled Book',
            'author' => 'Aa',
        ]);
        // passes if has errors
        $response->assertSessionHasErrors('author');
    }


    //Update/edit existing book tests
    /** @test */
    public function a_book_can_be_updated()
    {
        $this->withoutExceptionHandling();

        // POST request a new book
        $response = $this->post('/books/add', [
            'title' => 'An Untitled Book',
            'author' => 'John Doe',
        ]);

        // calls the first book object
        $book = Book::first();
        
        // PATCH request based on the id of $book
        // sets new values
        $response = $this->patch('/books/update/' . $book->id,[
            'title' => 'New Title',
            'author' => 'New Author',
        ]);
        
        // passes if redirects to '/books' (library view)
        $uri = '/books';
        $response->assertRedirect($uri);
        
        // passes if the first record has the new values
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
        
        // if empty (0 records of 'Book' objects) again then it passes
        $this->assertCount(0, Book::all());
    }
    
    //Book list tests
    /** @test */

    // to see if database is empty as this Test file uses RefreshDatabase()
    public function books_table_is_empty()
    {
        $this->withoutExceptionHandling();

        // if empty (0 records of 'Book' objects) again then it passes
        $this->assertCount(0, Book::all());
    }


}
