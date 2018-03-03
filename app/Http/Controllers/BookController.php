<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use App\Book;

// Temporary
class t_book {
    function __construct($cover, $title, $author, $rating, $price, $reviews) {
        $this->cover = $cover;
        $this->title = $title;
        $this->author = $author;
        $this->rating = $rating;
        $this->price = $price;
        $this->reviews = $reviews;
    }
}

class BookController extends Controller
{

    /**
     *
     */
    private $router;

    /**
     * Instantiate a new BookController instance.
     * 
     * Add middleware here to run on request before recieved.
     *
     * @return void
     */
    public function __construct(Router $router)
    {
        // $this->middleware('auth');
        $this->router = $router;
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
        
        $request = Request::create('/api/books/'. (string)$id, 'GET');
        $response = $this->router->dispatch($request);
        $book = json_decode($response->getContent(), true);

        $request = Request::create('/api/reviews/book/'. (string)$id, 'GET');
        $response = $this->router->dispatch($request);
        $book['reviews'] = json_decode($response->getContent(), true);

        return view('book', $book);
    }
}
