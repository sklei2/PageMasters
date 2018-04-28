<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Router;

class AdminController extends Controller
{
    /**
     * Instantiate a new AdminController instance.
     *
     * Add middleware here to run on request before recieved.
     *
     * @return void
     */

    protected $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function show() {
        if (auth()->check()) {
            $requestBooks = Request::create('/api/books', 'GET');
            $requestCourses = Request::create('/api/courses','GET');
            $resBooks = $this->router->dispatch($requestBooks);
            $resCourses = $this->router->dispatch($requestCourses);
            $decodedBooks = json_decode($resBooks->content());
            $decodedCourses = json_decode($resCourses->content());
            return view('admin', ['books'=>  $decodedBooks, 'courses'=>$decodedCourses]);    
        } else {
            return redirect('login');
        }        
    }
}