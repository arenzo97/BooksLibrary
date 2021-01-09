<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BooksLibraryAddTest extends TestCase
{
    /** @test */
    public function add_book_to_library()
    {
        $response = $this->post('/library', [
            'title' => 'An Untitled Book',
            'author' => 'John Doe'
        ]);

        $response->assertOk();

        $this->assertCount(1, Book::all);
    }
}
