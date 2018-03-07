<?php

namespace App\Http\Controllers\ApiControllers;

use App\Repositories\CartRepository\CartRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Moels\CartItem;
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

    public function getByStudentId($student_id) {
        $cart = $this->cart->getByStudentId($student_id);
        $code = $cart != null ? 200 : 404;
        $content = $cart != null ? $cart->cartItems : null;
        return response($content, $code);
    } 

	public function addCartItem($student_id, Request $request) {        
        $cart = $this->cart->getByStudentId($student_id);
        $cartItem = CartItem::updateOrCreate($request->all());
        if (!$cart) {
            $cart = $this->cart->create(['student_id' => $student_id]);       
        } 
        $cart->cartItems()->save($cartItem);
        return response(200);
    }

    public function updateCartItem($student_id, Request $request) {
        $cart = $this->cart->getByStudentId($stude);
        if (!$cart) {
            return response(404);
        }
        $success = $this->cart->cartItems()->update($request);
        $code = $success ? 200 : 404;
        return response($code);
    }



    public function delete($id) {
    	$success = $this->cart->delete($id);
        $code = $success ? 200 : 404;
        return response($code);
    }
    
}
