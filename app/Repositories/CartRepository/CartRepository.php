<?php

namespace App\Repositories\CartRepository;

use App\Repositories\CartRepository\CartRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Models\Cart as Cart;

class CartRepository extends BaseRepository implements CartRepositoryInterface {

	public function __construct(Cart $cart) {
		$this->model = $review;
	}

	public function getByStudentId($id) {
		return $this->model->where('student_id', '=', $id)->get();
	}
}