<?php 

namespace App\Repositories\BookRepository;

use App\Models\Book as Book;

interface BookRepositoryInterface {
	public function getAll();
	public function get($id);
	public function delete($id);
	public function create(array $attributes);
	public function update($id, array $attributes);
}
