<?php 

namespace App\Repositories\ReviewRepository;

interface ReviewRepositoryInterface {
	public function getAll();
	public function get($id);
	public function getByBookId($id);
	public function getByStudentId($id);
	public function delete($id);
	public function create(array $attributes);
	public function update($id, array $attributes);
}
