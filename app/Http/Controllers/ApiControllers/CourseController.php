<?php

namespace App\Http\Controllers\ApiControllers;

use App\Repositories\CourseRepository\CourseRepositoryInterface;
use App\Models\Course as Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
	private $course;

	public function __construct(CourseRepositoryInterface $course) {
		$this->course = $course;
	}

    public function create(Request $request) {
    	$course = $this->course->create($request->all());
        $code = $course != null ? 200 : 400;
        return response($course, $code);
    }

    public function getAll() {
    	return $this->course->getAll();
    }

    public function get($id) {
        $course = $this->course->get($id);
        $code = $course != null ? 200 : 404;
    	return response($course, $code);
    }

    public function getBooks($id) {
        $course = $this->course->get($id);
        if ($course != null) {
            return response($course->books->all(), 200);
        } else {
            return response($course, 404);
        }
    }

	public function update(Request $request, $id) {            
    	$success = $this->course->update($id, $request->all());
        $code = $success ? 200 : 400;
        return response($code);
    }

    public function delete($id) {
    	$success = $this->course->delete($id);
        $code = $success ? 200 : 404;
        return response($code);
    }
    
}
