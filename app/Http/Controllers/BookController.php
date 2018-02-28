<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    /**
     * Instantiate a new BookController instance.
     * 
     * Add middleware here to run on request before recieved.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the detail page for the given book.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // Eventually we will us this. For now we need to fake stuff
        // return view('book', ['book' => Book::findOrFail($id)]);
        
        switch($id){
            case 0:
                $book = array(
                    'title' => 'Book Title 1',
                    'author' => 'John Doe',
                    'code' => '123456789',
                    'img' => 'images/book.png',
                    'price' => 2000.01
                );
                break;
            case 1:
                $book = array(
                    'title' => 'Book Title 2',
                    'author' => 'John Doe 2',
                    'code' => '13245474',
                    'img' => 'images/book.png',
                    'price' => 900.23
                );
                break;
            case 2:
                $book = array(
                    'title' => 'Book Title 3',
                    'author' => 'John Doe 3',
                    'code' => '74159753',
                    'img' => 'images/book.png',
                    'price' => 4404.00
                );
                break;
            default:
                $book = array(
                    'title' => 'Book Title other',
                    'author' => 'John Doe 4',
                    'code' => '0',
                    'img' => 'images/book.png',
                    'price' => 10.0
                );

        }

        return view('pages.book', $book);
    }
}
