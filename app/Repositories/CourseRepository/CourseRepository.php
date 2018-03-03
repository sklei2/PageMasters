<?php

namespace App\Repositories\CourseRepository;

use App\Repositories\CourseRepository\CourseRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Models\Course as Course;

class CourseRepository extends BaseRepository implements CourseRepositoryInterface {

	public function __construct(Course $course) {
		$this->model = $course;
	}

	public function getAll() {
		return $this->model->all();
	}

	public function get($id) {
		return $this->model->find($id);
	}

	public function delete($id) {
		return $this->model->destroy($id);
	}

	public function create(array $attributes) {
		return $this->model->create($attributes);
	}

	public function update($id, array $attributes) {
		$user = $this->get($id);
		if ($user != null) {
			return $user->update($attributes);			
		} else {
			return $this->create($attributes);
		}		
	}
}