<?php

namespace App\Http\Controllers\ApiControllers;

use App\Repositories\CartRepository\CartRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Book;
use Illuminate\Http\Request;

class CartController extends Controller
{
	private $cart;

	public function __construct(CartRepositoryInterface $cart) {
		$this->cart = $cart;
	}

    public function getByStudentId($student_id) {
        $cart = $this->cart->getByStudentId($student_id);
        $code = $cart != null ? 200 : 404;
        $content = null;
        if ($cart) {
            $content = CartItem::join('books', 'books.id', 'book_id')->where('cart_id', '=', $cart->id)->get();
        }            
        return response($content, $code);
    } 

	public function addBookToCart($student_id, Request $request) {
        $book_id = $request->input('book_id');
        $quantity = $request->input('book_quantity');
        $cart = $this->cart->getByStudentId($student_id);
        if (!$cart) {
            $cart = $this->cart->create(['student_id' => $student_id]);
        }

        $item = $cart->cartItems()->where('book_id', '=', $book_id)->first();

        if($item) {
            $totalQuantity = $item->book_quantity + $quantity;
            $data = array(['book_quantity' => $totalQuantity]);
            $item->book_quantity = $totalQuantity;
            $item->save();
        } else {
            $attributes = $request->all();
            $attributes['cart_id'] = $cart->id;
            $item = CartItem::create($attributes);
            $cart->cartItems()->save($item);
        }

        return response(200);
    }

    public function removeBookFromCart($student_id, Request $request) {        
        $code = 404;
        $cart = $this->cart->getByStudentId($student_id);

        if ($cart) {
            $book_id = $request->input('book_id');
            $quantity = $request->input('book_quantity');
            $item = $cart->cartItems()->where('book_id', '=', $book_id)->first();
            if($item) {
                $totalQuantity = $item->book_quantity - $quantity;
                if ($totalQuantity <= 0) {
                    $item->delete();
                } else {
                    $item->book_quantity = $totalQuantity;
                    $item->save();
                }
                $code = 200;
            }
        }
        return response($code);
    }

    public function deleteUsersCart($id) {
    	$cart = $this->cart->getByStudentId($id);
        if ($cart) {
            $success = $this->cart->delete($cart->id);
        }
        $code = $success ? 200 : 404;
        return response($code);
    }
    
}
