<?php

namespace App\Repositories\AdminRepository

use App\Repositories\AdminRepository\AdminRepositoryInterface;
use App\Models\Admin as Admin;

class AdminMockRepository implements AdminRepositoryInterface {

	private $fakeData;

	public function __construct() {
		$this->fakeData = [
			new Admin(1, 'Admin 1'),
			new Admin(2, 'Admin 2')
		];
	}

	public function getAll() {
		return json_encode($this->fakeData);
	}

	public function get($id){
		$object = null;
		foreach ($this->fakeData as $key => $value) {
			if (value['id'] == $id) {
				$object = value;
				break;
			}
		}
		return json_encode($object);
	}

	public function delete($id){
		foreach ($this->fakeData as $key => $value) {
			if ($value['id'] == $id) {
				unset($fakeData[$key]);
				return true;
			}
		}
		return false;
	}

	public function createWithModel(Admin $admin){
		if (get($admin->id) == null) {
			array_push($this->fakeData, $admin);	
			return true;
		}
		return false;
	}

	public function createWithData(array $data){		
		$admin = new Admin($data['id'], $data['name']);
		return createWithModel($admin);		
	}

	public function updateWithModel($id, Admin $admin){
		foreach ($this->fakeData as $key => $value) {
			if ($value['id'] == $id) {
				$this->fakeData[$key] = $admin;
				return;
			}
		}
		// if the model doesn't exist, we'll just add it.
		array_push($this->fakeData, $admin);
	}

	public function updateWithData($id, array $data){
		$admin = new Admin($data['id'], $data['name']);
		return updateWithModel($admin);
	}

}