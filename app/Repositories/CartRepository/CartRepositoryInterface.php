<?php 

namespace App\Repositories\CartRepository;

interface CartRepositoryInterface {
	public function getAll();
	public function get($id);
	public function getByStudentId($id);
	public function delete($id);
	public function create(array $attributes);
	public function update($id, array $attributes);
}
