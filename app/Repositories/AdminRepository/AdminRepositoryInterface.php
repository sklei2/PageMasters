<?php 

namespace App\Repositories\AdminRepository;

use App\Repositories\BaseRepository;
use App\Models\Admin as Admin;

interface AdminRepositoryInterface extends BaseRepository {
	public function getAll();
	public function get($id);
	public function delete($id);
	public function create(array $data);
	public function update($id, array $data);
}
