<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class AdminAPITest extends TestCase
{

    /**
     * Test the GET /api/admins Route
     *
     * @return void
     */
    public function testGetAllAdminsTest()
    {
        $response = $this->get('/api/admins');

        $response->assertStatus(200);
    }

    /**
     * Test the GET /api/admins/{$id} Route
     *
     * @return void
     */
    public function testGetAdminByIDTest()
    {
        $response = $this->get('/api/admins/1');

        $response->assertStatus(200);
    }

    /**
     * Test the GET /api/admins/{$id} Route
     * Where the admin does not exist
     *
     * @return void
     */
    public function testGetAdminByIDDNETest()
    {
        $response = $this->get('/api/admins/0');

        $response->assertStatus(404);
    }

    /**
     * Test the POST /api/admins/create Route
     *
     * @return $test_admin_id the id of the admin created
     */
    public function testCreateAdminTest()
    {
        $admin_args = array(
            'name' => 'TestAdmin'
        );

        $response = $this->post('/api/admins/create', $admin_args);;

        $response->assertStatus(200);

        $content = json_decode($response->getContent(), true);

        return $content['id'];
    }

    /**
     * Test the PUT /api/admins/update/{$id} Route
     *
     * @depends testCreateAdminTest
     */
    public function testUpdateAdminByIDTest($test_admin_id)
    {
        $response = $this->put('/api/admins/update/'. $test_admin_id, ['name' => 'updatedtestadminname']);

        $response->assertStatus(200);
    }

    /**
     * Test the DELETE /api/admins/delete/{$id} Route
     *
     * @depends testCreateAdminTest
     */
    public function testDeleteAdminByIDTest($test_admin_id)
    {
        $response = $this->delete('/api/admins/delete/'. $test_admin_id);

        $response->assertStatus(200);
    }
}
