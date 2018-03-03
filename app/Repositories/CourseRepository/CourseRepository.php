<?php

namespace App\Repositories\CourseRepository;

use App\Repositories\CourseRepository\CourseRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Models\Course as Course;

class CourseRepository extends BaseRepository implements CourseRepositoryInterface {

	public function __construct(Course $course) {
		$this->model = $course;
	}
}