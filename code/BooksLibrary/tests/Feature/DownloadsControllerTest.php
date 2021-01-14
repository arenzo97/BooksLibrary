<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\BooksController;
use App\Models\Book;
use Tests\TestCase;


class DownloadsControllerTest extends TestCase
{
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
        
        $query = '/books/download/csv/all';
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
        
        $query = '/books/download/csv/title';
        $response = $this->get($query);
        $response->assertOk();
    }

    /** @test */
    public function download_author_only_books_list_csv()
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
        
        $query = '/books/download/csv/author';
        $response = $this->get($query);
        $response->assertOk();
    }
}