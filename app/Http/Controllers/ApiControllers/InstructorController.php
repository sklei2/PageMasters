<?php

namespace App\Http\Controllers\ApiControllers;

use App\Repositories\InstructorRepository\InstructorRepositoryInterface;
use App\Models\Instructor as Instructor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
	private $instructor;

	public function __construct(InstructorRepositoryInterface $instructor) {
		$this->instructor = $instructor;
	}

    public function create(Request $request) {
    	$instructor = $this->instructor->create($request->all());
        $code = $instructor != null ? 200 : 400;
        return response($instructor, $code);
    }

    public function getAll() {
    	return $this->instructor->getAll();
    }

    public function get($id) {
        $instructor = $this->instructor->get($id);
        $code = $instructor != null ? 200 : 404;
    	return response($instructor, $code);
    }

    public function getCourses($id) {
        $instructor = $this->instructor->get($id);
        if ($instructor != null) {
            return response($instructor->courses->all(), 200);
        } else {
            return response($instructor, 404);
        }
    }    

	public function update(Request $request, $id) {            
    	$success = $this->instructor->update($id, $request->all());
        $code = $success ? 200 : 400;
        return response($code);
    }

    public function delete($id) {
    	$success = $this->instructor->delete($id);
        $code = $success ? 200 : 404;
        return response($code);
    }
    
}
