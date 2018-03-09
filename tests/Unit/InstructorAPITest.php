<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class InstructorAPITest extends TestCase
{

    /**
     * Test the GET /api/instructors Route
     *
     * @return void
     */
    public function testGetAllInstructorsTest()
    {
        $response = $this->get('/api/instructors');

        $response->assertStatus(200);
    }

    /**
     * Test the GET /api/instructors/{$id} Route
     *
     * @return void
     */
    public function testGetInstructorByIDTest()
    {
        $response = $this->get('/api/instructors/1');

        $response->assertStatus(200);
    }

    /**
     * Test the GET /api/instructors/{$id} Route
     * Where the instructor does not exist
     *
     * @return void
     */
    public function testGetInstructorByIDDNETest()
    {
        $response = $this->get('/api/instructors/0');

        $response->assertStatus(404);
    }

    /**
     * Test the GET /api/instructors/{$id}/courses Route
     *
     * @return void
     */
    public function testGetCoursesForInstructorTest()
    {
        $response = $this->get('/api/instructors/1/courses');

        $response->assertStatus(200);
    }

    /**
     * Test the GET /api/instructors/{$id}/courses Route
     *
     * @return void
     */
    public function testGetCoursesDNEForInstructorTest()
    {
        $response = $this->get('/api/instructors/0/courses');

        $response->assertStatus(404);
    }

    /**
     * Test the POST /api/instructors/create Route
     *
     * @return $test_instructor_id the id of the instructor created
     */
    public function testCreateInstructorTest()
    {
        $instructor_args = array(
            'fName' => 'TestInstructor',
            'lName' => 'TestInstructorlastname'
        );

        $response = $this->post('/api/instructors/create', $instructor_args);;

        $response->assertStatus(200);

        $content = json_decode($response->getContent(), true);

        return $content['id'];
    }

    /**
     * Test the PUT /api/instructors/update/{$id} Route
     *
     * @depends testCreateInstructorTest
     */
    public function testUpdateInstructorByIDTest($test_instructor_id)
    {
        $response = $this->put('/api/instructors/update/'. $test_instructor_id, ['fName' => 'updatedtestinstructorname']);

        $response->assertStatus(200);
    }
    
    /**
     * Test the DELETE /api/instructors/delete/{$id} Route
     *
     * @depends testCreateInstructorTest
     */
    public function testDeleteInstructorByIDTest($test_instructor_id)
    {
        $response = $this->delete('/api/instructors/delete/'. $test_instructor_id);

        $response->assertStatus(200);
    }

    /**
     * Test the PUT /api/instructors/update/{$id} Route
     */
    public function testUpdateInstructorByIDDNETest()
    {
        $response = $this->put('/api/instructors/update/0', ['fName' => 'updatedtestinstructorname']);

        $response->assertStatus(500);
    }

}
