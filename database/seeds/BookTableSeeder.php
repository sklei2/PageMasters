<?php

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->delete();

        Book::create([
        	'title' => 'The FellowShip of the Ring',
         	'author' => 'J.R.R. Tolkien',
         	'isbn' => '0547928211', 
         	'rating' => 4.50, 
         	'price' => 17.31
         ]);

        Book::create([
        	'title' => 'The Martian',
         	'author' => 'Andy Weir',
         	'isbn' => '0553418025', 
         	'rating' => 4.70, 
         	'price' => 10.97
         ]);

        Book::create([
        	'title' => 'Design Patterns: Elements of Reusable Object-Oriented Software',
         	'author' => 'Erich Gamma, Richard Helm, Ralph Johnson',
         	'isbn' => '0201633612', 
         	'rating' => 4.50, 
         	'price' => 27.85
         ]);

        Book::create([
        	'title' => "If You Ask Me: (And of Course You Won't)",
         	'author' => 'Betty White',
         	'isbn' => '0425245284', 
         	'rating' => 4.20, 
         	'price' => 7.68
         ]);
    }
}
