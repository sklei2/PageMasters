<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

abstract class BaseRepository {

	protected $model;

	public function __construct(Model $model) {
		$this->model = $model;
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