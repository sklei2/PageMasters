<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class CourseAPITest extends TestCase
{

    /**
     * Test the GET /api/courses Route
     *
     * @return void
     */
    public function testGetAllCoursesTest()
    {
        $response = $this->get('/api/courses');

        $response->assertStatus(200);
    }

    /**
     * Test the GET /api/courses/{$id} Route
     *
     * @return void
     */
    public function testGetCourseByIDTest()
    {
        $response = $this->get('/api/courses/1');

        $response->assertStatus(200);
    }

    /**
     * Test the GET /api/courses/{$id} Route
     * Where the course does not exist
     *
     * @return void
     */
    public function testGetCourseByIDDNETest()
    {
        $response = $this->get('/api/courses/0');

        $response->assertStatus(404);
    }

    /**
     * Test the GET /api/courses/{$id}/books Route
     *
     * @return void
     */
    public function testGetBooksForCourseTest()
    {
        $response = $this->get('/api/courses/1/books');

        $response->assertStatus(200);
    }

    /**
     * Test the GET /api/courses/{$id}/books Route
     *
     * @return void
     */
    public function testGetBooksDNEForCourseTest()
    {
        $response = $this->get('/api/courses/0/books');

        $response->assertStatus(404);
    }

    /**
     * Test the POST /api/courses/create Route
     *
     * @return $test_course_id the id of the course created
     */
    public function testCreateCourseTest()
    {
        $course_args = array(
            'name' => 'TestCourse',
            'description' => 'TestCourseDescription'
        );

        $response = $this->post('/api/courses/create', $course_args);;

        $response->assertStatus(200);

        $content = json_decode($response->getContent(), true);

        return $content['id'];
    }

    /**
     * Test the PUT /api/courses/update/{$id} Route
     *
     * @depends testCreateCourseTest
     */
    public function testUpdateCourseByIDTest($test_course_id)
    {
        $response = $this->put('/api/courses/update/'. $test_course_id, ['name' => 'updatedtestcoursename']);

        $response->assertStatus(200);
    }

    /**
     * Test the PUT /api/courses/update/{$id} Route
     *
     * @depends testCreateCourseTest
     */
    public function testUpdateCourseByIDDNETest()
    {
        $response = $this->put('/api/courses/update/0', ['name' => 'updatedtestcoursename']);

        $response->assertStatus(500);
    }

    /**
     * Test the DELETE /api/courses/delete/{$id} Route
     *
     * @depends testCreateCourseTest
     */
    public function testDeleteCourseByIDTest($test_course_id)
    {
        $response = $this->delete('/api/courses/delete/'. $test_course_id);

        $response->assertStatus(200);
    }
}
