<?php

namespace Tests\Unit;

use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_show_book()
    {
        $response = $this->get("/vw_book");

        $response->assertStatus(302);
    }

    public function test_create_book()
    {
        $response = $this->post('/add_book', [
            'title' => 'Test Book',
            'author' => 'Test Author',
            'description' => 'This is a test book description.',
            'cover' => 'test.png',
            'rating' => 5,
            'user_id' => 1,
        ]);
        $response->assertStatus(302);
    }

    public function test_update_book()
    {
        $book = Book::factory()->create();
        $response = $this->post('/update_book/{$book->id}', [
            'title' => 'Test Book',
            'author' => 'Test Author',
            'description' => 'This is a test book description.',
            'cover' => 'test.png',
            'rating' => 5,
            'user_id' => 1,
        ]);

        $response->assertStatus(302);
    }

    public function test_delete_book()
    {
        $book = Book::factory()->create();
        $response = $this->get('/delete_book/{$book->id}', [
            'title' => 'Test Book',
            'author' => 'Test Author',
            'description' => 'This is a test book description.',
            'cover' => 'test.png',
            'rating' => 5,
            'user_id' => 1,
        ]);

        $response->assertStatus(302);
    }

    public function test_search_book()
    {
        $book = Book::factory()->create();

        $response = $this->get('/book_search');

        $response->assertStatus(302);
    }
}
