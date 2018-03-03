<?php

namespace App\Repositories\AdminRepository;

use App\Repositories\AdminRepository\AdminRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Models\Admin as Admin;

class AdminRepository extends BaseRepository implements AdminRepositoryInterface {

	public function __construct(Admin $admin) {
		$this->model = $admin;
	}
}