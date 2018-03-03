<?php

namespace App\Repositories\StudentRepository;

use App\Repositories\StudentRepository\StudentRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Models\Student as Student;

class StudentRepository extends BaseRepository implements StudentRepositoryInterface {

	public function __construct(Student $student) {
		$this->model = $student;
	}
}