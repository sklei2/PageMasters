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

        // get the average of each book on the fly rather than storing
        // the average in the DB.
        foreach($decoded as $book){
            $count = \DB::table('reviews')
                ->selectRaw('AVG(rating) as average_rating')
                ->where('book_id', $book->id)
                ->get();
            $avg = $count[0]->average_rating;
            $book->averageRating = $avg;
        }

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
        $count = \DB::table('reviews')
            ->selectRaw('AVG(rating) as average_rating')
            ->where('book_id', $book['id'])
            ->get();
        $avg = $count[0]->average_rating;
        $book['averageRating'] = $avg;

        return view('book', $book);
    }
}
