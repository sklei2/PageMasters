<?php

namespace App\Repositories\CartRepository;

use App\Repositories\CartItemRepository\CartItemRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Models\Cart as Cart;

class CartRepository extends BaseRepository implements CartRepositoryInterface {

	public function __construct(Cart $cart) {
		$this->model = $cart;
	}

	public function getByStudentId($student_id) {
		return $this->model->where('student_id', '=', $student_id)->first();
	}
}