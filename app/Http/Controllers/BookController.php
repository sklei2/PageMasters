<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Illuminate\Routing\Router;

// Temporary
class t_book {
    function __construct($cover, $title, $author, $rating, $price) {
        $this->cover = $cover;
        $this->title = $title;
        $this->author = $author;
        $this->rating = $rating;
        $this->price = $price;
    }
}

class BookController extends Controller
{
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
        // Eventually we will us this. For now we need to fake stuff
        // return view('book', ['book' => Book::findOrFail($id)]);
        
        $books = array(
          new t_book(
            'https://prodimage.images-bn.com/pimages/9781524763138_p0_v2_s600x595.jpg',
            'Becoming',
            'Michelle Obama',
            '5 Stars',
            '$22.75'
          ),
          new t_book(
          'https://prodimage.images-bn.com/pimages/9781982101534_p0_v1_s600x595.jpg',
          'The Forgotten Road',
          'Richard Paul Evans',
          '4 Stars',
          '$14.65'
          ),
          new t_book(
          'https://prodimage.images-bn.com/pimages/9781524714680_p0_v2_s600x595.jpg',
          'One of Us Is Lying',
          'Karen M. McManus',
          '1 Star',
          '$13.3'
          ),
          new t_book(
            'https://prodimage.images-bn.com/pimages/9780316513227_p0_v1_s600x595.jpg',
            'Fifty Fifty',
            'James Patterson',
            '5 Stars',
            '$16.79'
          ),
          new t_book(
            'https://prodimage.images-bn.com/pimages/9780399590504_p0_v3_s600x595.jpg',
            'Educated',
            'Tara Westover',
            '3 Stars',
            '$16.80'
          )
        );

        return view('cart', (array) $books[$id]);
    }
}
