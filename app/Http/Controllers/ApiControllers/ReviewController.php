<?php

namespace App\Http\Controllers\ApiControllers;

use App\Repositories\ReviewRepository\ReviewRepositoryInterface;
use App\Models\Review as Review;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
	private $review;

	public function __construct(ReviewRepositoryInterface $review) {
		$this->review = $review;
	}

    public function create(Request $request) {
    	$review = $this->review->create($request->all());
        $code = $review != null ? 200 : 400;
        return response($review, $code);
    }

    public function getAll() {
    	return $this->review->getAll();
    }

    public function get($id) {
        $review = $this->review->get($id);
        $code = $review != null ? 200 : 404;
    	return response($review, $code);
    }

    public function getByBookId($id) {
        $reviews = $this->review->getByBookId($id);
        if ($reviews != null) {
            return response($reviews, 200);
        } else {
            return response($reviews, 404);
        }
    }

    public function getByStudentId($id) {
        $reviews = $this->review->getByStudentId($id);
        if ($reviews != null) {
            return response($reviews, 200);
        } else {
            return response($reviews, 404);
        }
    }

	public function update(Request $request, $id) {            
    	$success = $this->review->update($id, $request->all());
        $code = $success ? 200 : 400;
        return response($code);
    }

    public function delete($id) {
    	$success = $this->review->delete($id);
        $code = $success ? 200 : 404;
        return response($code);
    }
    
}
