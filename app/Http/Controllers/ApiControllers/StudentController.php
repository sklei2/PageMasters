<?php

namespace App\Http\Controllers\ApiControllers;

use App\Repositories\StudentRepository\StudentRepositoryInterface;
use App\Models\Student as Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
	private $student;

	public function __construct(StudentRepositoryInterface $student) {
		$this->student = $student;
	}

    public function create(Request $request) {
    	$student = $this->student->create($request->all());
        $code = $student != null ? 200 : 400;
        return response($student, $code);
    }

    public function getAll() {
    	return $this->student->getAll();
    }

    public function get($id) {
        $student = $this->student->get($id);
        $code = $student != null ? 200 : 404;
    	return response($student, $code);
    }

    public function getCourses($id) {
        $student = $this->student->get($id);
        if ($student != null) {
            return response($student->courses->all(), 200);
        } else {
            return response($student, 404);
        }
    }    

    public function getBooks($id) {
        $student = $this->student->get($id);
        if ($student != null) {
            return response($student->books->all(), 200);
        } else {
            return response($student, 404);
        }
    }

	public function update(Request $request, $id) {            
    	$success = $this->student->update($id, $request->all());
        $code = $success ? 200 : 400;
        return response($code);
    }

    public function updateBooks(Request $request, $id) {
        $success = $this->student->updateBooks($id, $request->all());
        $otherSuccess = $this->student->subtractFunds($id, $request->all());
        $code = $success && $otherSuccess ? 200 : 400;
        return response($success);
    }

    public function delete($id) {
    	$success = $this->student->delete($id);
        $code = $success ? 200 : 404;
        return response($code);
    }
    
}
