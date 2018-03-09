<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class StudentAPITest extends TestCase
{

    /**
     * Test the GET /api/students Route
     *
     * @return void
     */
    public function testGetAllStudentsTest()
    {
        $response = $this->get('/api/students');

        $response->assertStatus(200);
    }

    /**
     * Test the GET /api/students/{$id} Route
     *
     * @return void
     */
    public function testGetStudentByIDTest()
    {
        $response = $this->get('/api/students/1');

        $response->assertStatus(200);
    }

    /**
     * Test the GET /api/students/{$id} Route
     * Where the student does not exist
     *
     * @return void
     */
    public function testGetStudentByIDDNETest()
    {
        $response = $this->get('/api/students/0');

        $response->assertStatus(404);
    }

    /**
     * Test the GET /api/students/{$id}/books Route
     *
     * @return void
     */
    public function testGetStudentBooksTest()
    {
        $response = $this->get('/api/students/1/books');

        $response->assertStatus(200);
    }

    /**
     * Test the GET /api/students/{$id}/courses Route
     *
     * @return void
     */
    public function testGetStudentCoursesTest()
    {
        $response = $this->get('/api/students/1/courses');

        $response->assertStatus(200);
    }

    /**
     * Test the POST /api/students/create Route
     *
     * @return $test_student_id the id of the student created
     */
    public function testCreateStudentTest()
    {
        $student_args = array(
            'fName' => 'TestStudent',
            'lName' => 'testStudentLastName'
        );

        $response = $this->post('/api/students/create', $student_args);;

        $response->assertStatus(200);

        $content = json_decode($response->getContent(), true);

        return $content['id'];
    }

    /**
     * Test the PUT /api/students/update/{$id} Route
     *
     * @depends testCreateStudentTest
     */
    public function testUpdateStudentByIDTest($test_student_id)
    {
        $response = $this->put('/api/students/update/'. $test_student_id, ['fName' => 'updatedteststudentname']);

        $response->assertStatus(200);
    }

    /**
     * Test the DELETE /api/students/delete/{$id} Route
     *
     * @depends testCreateStudentTest
     */
    public function testDeleteStudentByIDTest($test_student_id)
    {
        file_put_contents('debug.txt', print_r($test_student_id, true));
        $response = $this->delete('/api/students/delete/'. $test_student_id);

        $response->assertStatus(200);
    }
}
