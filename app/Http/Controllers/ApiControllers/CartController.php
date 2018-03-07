<?php

namespace App\Http\Controllers\ApiControllers;

use App\Repositories\CartRepository\CartRepositoryInterface;
use App\Models\CartItem as CartItem;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
	private $cart;

	public function __construct(CartRepositoryInterface $cart) {
		$this->cart = $cart;
	}

    public function create(Request $request) {
    	$cart = $this->cart->create($request->all());
        $code = $cart != null ? 200 : 400;
        return response($cart, $code);
    }

    public function getAll() {
    	return $this->cart->getAll();
    }

    public function get($id) {
        $cart = $this->cart->get($id);
        $code = $cart != null ? 200 : 404;
    	return response($cart->cartItems(), $code);
    }

    public function getByStudentId($student_id) {
        $cart = $this->cart->where('student_id', '=', $student_id)->first();

    }

	public function update(Request $request, $id) {            
    	$success = $this->cart->update($id, $request->all());
        $code = $success ? 200 : 400;
        return response($code);
    }

    public function delete($id) {
    	$success = $this->cart->delete($id);
        $code = $success ? 200 : 404;
        return response($code);
    }
    
}
