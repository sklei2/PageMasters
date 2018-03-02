<?php

namespace App\Http\Controllers\ApiControllers;

use App\Repositories\AdminRepository\AdminRepositoryInterface;
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
    	$admin = $this->admin->create($request->all());
        $code = $admin != null ? 200 : 400;
        return response($admin, $code);
    }

    public function getAll() {
    	return $this->admin->getAll();
    }

    public function get($id) {
        $admin = $this->admin->get($id);
        $code = $admin != null ? 200 : 404;
    	return response($admin, $code);
    }

	public function update(Request $request, $id) {            
    	$success = $this->admin->update($id, $request->all());
        $code = $success ? 200 : 400;
        return response($code);
    }

    public function delete($id) {
    	$success = $this->admin->delete($id);
        $code = $success ? 200 : 404;
        return response($code);
    }
    
}
