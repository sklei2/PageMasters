<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use Illuminate\Routing\Router;

class CartController extends Controller
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

    public function getCart() {    
        $request = Request::create('/api/carts/2', 'GET');
        $res = $this->router->dispatch($request);
        $decoded = json_decode($res->content());
        return view('cart', ['response'=>  $decoded]);
    }
}
