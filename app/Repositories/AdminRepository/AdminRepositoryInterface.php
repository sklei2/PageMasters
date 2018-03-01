<?php 

namespace App\Repositories\AdminRepository;

use App\Models\Admin as Admin;

interface AdminRepositoryInterface {
	public function getAll();
	public function get($id);
	public function delete($id);
	public function createWithModel(Admin $admin);
	public function createWithData(array $data);
	public function updateWithModel($id, Admin $admin);
	public function updateWithData($id, array $data);
}
