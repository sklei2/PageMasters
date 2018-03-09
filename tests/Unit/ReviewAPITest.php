<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ReviewAPITest extends TestCase
{

    /**
     * Test the GET /api/reviews Route
     *
     * @return void
     */
    public function testGetAllReviewsTest()
    {
        $response = $this->get('/api/reviews');

        $response->assertStatus(200);
    }

    /**
     * Test the GET /api/reviews/{$id} Route
     *
     * @return void
     */
    public function testGetReviewByIDTest()
    {
        $response = $this->get('/api/reviews/1');

        $response->assertStatus(200);
    }

    /**
     * Test the GET /api/reviews/{$id} Route
     * Where the review does not exist
     *
     * @return void
     */
    public function testGetReviewByIDDNETest()
    {
        $response = $this->get('/api/reviews/0');

        $response->assertStatus(404);
    }

    /**
     * Test the GET /api/reviews/book/{$id} Route
     *
     * @return void
     */
    public function testGetBookReviewsByIDTest()
    {
        $response = $this->get('/api/reviews/book/1');

        $response->assertStatus(200);
    }

    /**
     * Test the GET /api/reviews/student/{$id} Route
     *
     * @return void
     */
    public function testGetStudentReviewsByIDTest()
    {
        $response = $this->get('/api/reviews/student/1');

        $response->assertStatus(200);
    }

    /**
     * Test the POST /api/reviews/create Route
     *
     * @return $test_review_id the id of the review created
     */
    public function testCreateReviewTest()
    {
        $review_args = array(
            'student_id' => '1',
            'book_id' => '1',
            'rating' => 5,
            'textReview' => 'wooooooooooooo',
        );

        $response = $this->post('/api/reviews/create', $review_args);;

        $response->assertStatus(200);

        $content = json_decode($response->getContent(), true);

        return $content['id'];
    }

    /**
     * Test the PUT /api/reviews/update/{$id} Route
     *
     * @depends testCreateReviewTest
     */
    public function testUpdateReviewByIDTest($test_review_id)
    {
        $response = $this->put('/api/reviews/update/'. $test_review_id, ['rating' => 2]);

        $response->assertStatus(200);
    }

    /**
     * Test the DELETE /api/reviews/delete/{$id} Route
     *
     * @depends testCreateReviewTest
     */
    public function testDeleteReviewByIDTest($test_review_id)
    {
        $response = $this->delete('/api/reviews/delete/'. $test_review_id);

        $response->assertStatus(200);
    }
}
