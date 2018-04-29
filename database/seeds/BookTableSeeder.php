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
        	'title' => 'The Fellowship of the Ring',
         	'author' => 'J.R.R. Tolkien',
         	'isbn' => '0547928211', 
         	'price' => 17.31,
            'isEnabled' => true,
            'bookImgSrc' => 'https://images-na.ssl-images-amazon.com/images/I/51tW-UJVfHL._SX321_BO1,204,203,200_.jpg',
            'in_stock' => 100
         ]);

        Book::create([
        	'title' => 'The Martian',
         	'author' => 'Andy Weir',
         	'isbn' => '0553418025', 
         	'price' => 10.97,
            'isEnabled' => false,
            'bookImgSrc' => 'https://upload.wikimedia.org/wikipedia/en/thumb/c/c3/The_Martian_2014.jpg/220px-The_Martian_2014.jpg',
            'in_stock' => 100
         ]);

        Book::create([
        	'title' => 'Design Patterns: Elements of Reusable Object-Oriented Software',
         	'author' => 'Erich Gamma, Richard Helm, Ralph Johnson',
         	'isbn' => '0201633612', 
         	'price' => 27.85,
            'isEnabled' => true,
            'bookImgSrc' => 'https://images-na.ssl-images-amazon.com/images/I/51szD9HC9pL._SX395_BO1,204,203,200_.jpg',
            'in_stock' => 100

        ]);

        Book::create([
        	'title' => "If You Ask Me: (And of Course You Won't)",
         	'author' => 'Betty White',
         	'isbn' => '0425245284', 
         	'price' => 7.68,
            'isEnabled' => true,
            'bookImgSrc' => 'https://images.gr-assets.com/books/1348700186l/9972053.jpg',
            'in_stock' => 100
         ]);
    }
}
