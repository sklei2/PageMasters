<?php

namespace App\Repositories\CartRepository;

use App\Repositories\CartItemRepository\CartItemRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Models\Cart as Cart;

class CartRepository extends BaseRepository implements CartRepositoryInterface {

	public function __construct(Cart $cart) {
		$this->model = $cart
	}
}