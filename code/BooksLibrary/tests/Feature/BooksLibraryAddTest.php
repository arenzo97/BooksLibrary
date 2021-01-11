<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Book;
use Tests\TestCase;

class BooksLibraryAddTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function add_book_to_books_table()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/books/add', [
            'title' => 'An Untitled Book',
            'author' => 'John Doe',
        ]);

        $response->assertOk();

        $this->assertCount(1, Book::all());
    }
}
