<?php

namespace App\Repositories\BookRepository;

use App\Repositories\BookRepository\BookRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Models\Book as Book;

class BookRepository extends BaseRepository implements BookRepositoryInterface {

	public function __construct(Book $admin) {
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