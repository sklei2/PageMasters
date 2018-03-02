<?php

namespace App\Http\Controllers\ApiControllers;

use App\Repository\AdminRepository\AdminRepositoryInterface;
use App\Models\Admin as Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
	private $admin;

	public function __construct(AdminRepositoryInterface $admin) {
		$this->admin = $admin;
	}

    public function create(Request $request) {
        $admin = new Admin($request->input('id'), $request->input('name'));        
    	return $this->admin->createWithModel($admin);
    }

    public function getAll() {
    	return $this->admin->getAll();
    }

    public function get($id) {
    	return $this->admin->get($id);
    }

	public function update(Request $request, $id) {    
        $admin = new Admin($request->input('id'), $request->input('name'));
    	return $this->admin->updateWithModel($id, $admin);
    }

    public function delete($id) {
    	return $this->admin->delete($id);
    }
    
}
