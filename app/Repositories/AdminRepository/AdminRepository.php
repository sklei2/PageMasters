<?php

namespace App\Repositories\AdminRepository;

use App\Repositories\AdminRepository\AdminRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Models\Admin as Admin;

class AdminRepository extends BaseRepository implements AdminRepositoryInterface {

	public function __construct(Admin $admin) {
		$this->model = $admin;
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