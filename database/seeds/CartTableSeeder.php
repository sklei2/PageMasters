<?php

use Illuminate\Database\Seeder;

use App\Models\Cart;
use App\Models\Book;

class CartTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carts')->delete();

        Cart::create([
        	'book_id' => Book::where('isbn', '=', '0547928211')->first()->id,
        	'book_quantity' => 1
        ]);

        Cart::create([
        	'book_id' => Book::where('isbn', '=', '0425245284')->first()->id,
        	'book_quantity' => 20
        ]);

        Cart::create([
        	'book_id' => Book::where('isbn', '=', '0553418025')->first()->id,
        	'book_quantity' => 5
        ]);
    }
}
