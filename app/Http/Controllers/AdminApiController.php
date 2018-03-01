<?php

namespace App\Http\Controllers;

use App\Repositories\AdminRepository\AdminMockRepository as Admin;
use Illuminate\Http\Request;

class AdminApiController extends Controller
{
	private $admin;

	public function __construct(Admin $admin) {
		$this->admin = $admin;
	}

    public function create(Admin $admin) {
    	return $this->admin->createWithModel($admin);
    }

    public function getAll() {
    	return $this->admin->getAll();
    }

    public function get($id) {
    	return $this->admin->get($id);
    }

	public function update($id, Admin $admin) {
    	return $this->admin->updateWithModel($id, $admin);
    }

    public function delete($id) {
    	return $this->admin->delete($id);
    }
    
}
