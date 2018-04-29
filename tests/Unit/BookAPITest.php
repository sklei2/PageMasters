<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class BookAPITest extends TestCase
{

    /**
     * Test the GET /api/books Route
     *
     * @return void
     */
    public function testGetAllBooksTest()
    {
        $response = $this->get('/api/books');

        $response->assertStatus(200);
    }

    /**
     * Test the GET /api/books/{$id} Route
     *
     * @return void
     */
    public function testGetBookByIDTest()
    {
        $response = $this->get('/api/books/2');

        $response->assertStatus(200);
    }

    /**
     * Test the GET /api/books/{$id} Route
     * Where the book does not exist
     *
     * @return void
     */
    public function testGetBookByIDDNETest()
    {
        $response = $this->get('/api/books/0');

        $response->assertStatus(404);
    }

    /**
     * Test the POST /api/books/create Route
     *
     * @return $test_book_id the id of the book created
     */
    public function testCreateBookTest()
    {
        $book_args = array(
            'title' => 'TestBook',
            'author' => 'TestBookAuthor',
            'price' => 10.0,
            'isbn' => 'TestBookISBN',
            'isEnabled' => true,
            'bookImgSrc' => 'TestBookIMGSRC',
            'in_stock' => '15'
        );

        $response = $this->post('/api/books', $book_args);;

        $response->assertStatus(200);

        $content = json_decode($response->getContent(), true);

        return $content['id'];
    }

    /**
     * Test the PUT /api/books/update/{$id} Route
     *
     * @depends testCreateBookTest
     */
    public function testUpdateBookByIDTest($test_book_id)
    {
        $response = $this->put('/api/books/'. $test_book_id, ['title' => 'updatedtestbooktitle']);

        $response->assertStatus(200);
    }

    /**
     * Test the PUT /api/books/update/{$id} Route
     *
     * @depends testCreateBookTest
     */
    public function testUpdateBookByIDDNETest()
    {
        $response = $this->put('/api/books/0', ['title' => 'updatedtestbooktitle']);

        $response->assertStatus(500);
    }

    /**
     * Test the DELETE /api/books/delete/{$id} Route
     *
     * @depends testCreateBookTest
     */
    public function testDeleteBookByIDTest($test_book_id)
    {
        $response = $this->delete('/api/books/'. $test_book_id);

        $response->assertStatus(200);
    }
}
