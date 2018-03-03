<?php

namespace App\Repositories\StudentRepository;

use App\Repositories\StudentRepository\StudentRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Models\Student as Student;

class InstructorRepository extends BaseRepository implements InstructorRepositoryInterface {

	public function __construct(Student $student) {
		$this->model = $student;
	}
}