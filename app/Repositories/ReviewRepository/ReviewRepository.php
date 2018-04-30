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
    public function create(array $attributes) {
	    $id = $attributes['student_id'];
	    $reviews = $this->getByStudentId($id);
	    $wasFound = false;
	    foreach($reviews as $review) {
	        if ($review->book_id == $attributes['book_id']) {
	            $wasFound = true;
	            break;
            }
        }
        if (!$wasFound) {
            return $this->model->create($attributes);
        }
        return null;
    }
}