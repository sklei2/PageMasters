<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use App\Book;

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
        $this->router = $router;
        // $this->middleware('auth');
    }

    public function getAll() {
        $request = Request::create('/api/books', 'GET');
        $res = $this->router->dispatch($request);
        $decoded = json_decode($res->content());
        return view('books', ['response'=>  $decoded]);
    }

    /**
     * Show the detail page for the given book.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        
        $request = Request::create('/api/books/'. (string)$id, 'GET');
        $response = $this->router->dispatch($request);
        $book = json_decode($response->getContent(), true);

        $request = Request::create('/api/reviews/book/'. (string)$id, 'GET');
        $response = $this->router->dispatch($request);
        $book['reviews'] = json_decode($response->getContent(), true);
        if ($book['reviews']) {
            $averageRating = 0;
            foreach ($book['reviews'] as $review) {
                $averageRating += $review['rating'];
            }
            $averageRating = $averageRating / count($book['reviews']);
            $book['averageRating'] = $averageRating;
        }
        return view('book', $book);
    }
}
