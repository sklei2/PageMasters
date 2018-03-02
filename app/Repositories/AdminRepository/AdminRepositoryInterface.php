<?php 

namespace App\Repositories\AdminRepository;

use App\Models\Admin as Admin;

interface AdminRepositoryInterface {
	public function getAll();
	public function get($id);
	public function delete($id);
	public function create(array $attributes);
	public function update($id, array $attributes);
}
