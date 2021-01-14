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
        $this->withoutExceptionHandling();
        $this->assertCount(0, Book::all());
    }

    /** @test */
    public function download_all_books_list_csv()
    {
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
        
        $query = '/books/download/all';
        $response = $this->get($query);
        $response->assertOk();
    }

    /** @test */
    public function download_title_only_books_list_csv()
    {
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
        
        $query = '/books/download/title';
        $response = $this->get($query);
        $response->assertOk();
    }

}
