<?php

use Illuminate\Database\Seeder;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Book;
use App\Models\Student;

class CartTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cart_items')->delete();

        $cart = Cart::create([
            'student_id' => Student::where('fName', '=', 'Jane')->first()->id
        ]);

        $cartItem = CartItem::create([
                'cart_id' => $cart->id,
                'book_id' => Book::where('isbn', '=', '0547928211')->first()->id,
                'book_quantity' => 1
            ]);

        $cart->cartItems()->save($cartItem);

        $cartItem = CartItem::create([
                'cart_id' => $cart->id,
                'book_id' => Book::where('isbn', '=', '0425245284')->first()->id,
                'book_quantity' => 20
            ]);

        $cart->cartItems()->save($cartItem);

        $cart = Cart::create([
            'student_id' => Student::where('fName', '=', 'Clark')->first()->id
        ]);

        $cart->cartItems()->save(
            CartItem::create([
                'cart_id' => $cart->id,
                'book_id' => Book::where('isbn', '=', '0553418025')->first()->id,
                'book_quantity' => 5
            ])
        );
    }
}
