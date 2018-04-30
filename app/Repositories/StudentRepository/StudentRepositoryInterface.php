<?php 

namespace App\Repositories\StudentRepository;

interface StudentRepositoryInterface {
	public function getAll();
	public function get($id);
	public function delete($id);
	public function create(array $attributes);
	public function update($id, array $attributes);
	public function updateBooks($id, array $attributes);
	public function subtractFunds($id, array $attributes);
}
