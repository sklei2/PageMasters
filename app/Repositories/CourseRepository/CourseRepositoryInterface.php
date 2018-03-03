<?php 

namespace App\Repositories\CourseRepository;

use App\Models\Course as Course;

interface CourseRepositoryInterface {
	public function getAll();
	public function get($id);
	public function delete($id);
	public function create(array $attributes);
	public function update($id, array $attributes);
}
