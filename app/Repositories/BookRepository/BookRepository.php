<?php

namespace App\Repositories\BookRepository;

use App\Repositories\BookRepository\BookRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Models\Book as Book;

class BookRepository extends BaseRepository implements BookRepositoryInterface {

	public function __construct(Book $book) {
		$this->model = $book;
	}
}