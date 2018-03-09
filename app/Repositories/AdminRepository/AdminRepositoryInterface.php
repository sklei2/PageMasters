<?php 

namespace App\Repositories\AdminRepository;

interface AdminRepositoryInterface {
	public function getAll();
	public function get($id);
	public function delete($id);
	public function create(array $attributes);
	public function update($id, array $attributes);
}
