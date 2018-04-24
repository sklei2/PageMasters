<?php

namespace App\Repositories\CartRepository;

use App\Repositories\CartRepository\CartItemRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Models\CartItem as CartItem;

class CartItemRepository extends BaseRepository implements CartItemRepositoryInterface {

	public function __construct(CartItem $cartItem) {
		$this->model = $cartItem;
	}
}