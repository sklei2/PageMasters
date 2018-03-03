<?php

namespace App\Repositories\ReviewRepository;

use App\Repositories\ReviewRepository\ReviewRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Models\Review as Review;

class ReviewRepository extends BaseRepository implements ReviewRepositoryInterface {

	public function __construct(Review $review) {
		$this->model = $review;
	}

	public function getByBookId($id) {
		return $this->model->where('book_id', '=', $id)->get();
	}

	public function getByStudentId($id) {
		return $this->model->where('student_id', '=', $id)->get();
	}
}