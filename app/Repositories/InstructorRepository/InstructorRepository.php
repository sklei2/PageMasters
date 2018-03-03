<?php

namespace App\Repositories\InstructorRepository;

use App\Repositories\InstructorRepository\InstructorRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Models\Instructor as Instructor;

class InstructorRepository extends BaseRepository implements InstructorRepositoryInterface {

	public function __construct(Instructor $instructor) {
		$this->model = $instructor;
	}
}