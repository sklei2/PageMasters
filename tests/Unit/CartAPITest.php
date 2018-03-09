<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class CartAPITest extends TestCase
{

    /**
     * Test the GET /api/carts/{$id} Route
     *
     * @return void
     */
    public function testGetCartByIDTest()
    {
        $response = $this->get('/api/carts/3');

        $response->assertStatus(200);
    }

    /**
     * Test the PUT /api/carts/{$id}/add Route
     *
     * @return void
     */
    public function testAddCartBooksTest()
    {
        $cart_item = array('book_id' => 1, 'book_quantity' => 2);
        $response = $this->put('/api/carts/1/add', $cart_item);

        $response->assertStatus(200);

        $cart_item = array('book_id' => 1, 'book_quantity' => 2);
        $response = $this->put('/api/carts/4/add', $cart_item);

        $response->assertStatus(200);
    }

    /**
     * Test the PUT /api/carts/{$id}/remove Route
     */
    public function testRemoveCartBooksTest()
    {
        $cart_item = array('book_id' => 1, 'book_quantity' => 2);
        $response = $this->put('/api/carts/1/remove', $cart_item);

        $response->assertStatus(200);
    }

    /**
     * Test the DELETE /api/carts/{$id}/delete Route 
     */
    public function testDeleteCartByIDTest()
    {
        $response = $this->delete('/api/carts/4/delete');

        $response->assertStatus(200);
    }
}
