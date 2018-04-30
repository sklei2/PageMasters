<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use App\Models\Course;
use App\Models\Book;

class PreferencesController extends Controller
{
    /**
     * Instantiate a new PreferencesController instance.
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
            return view('preferences', ['books'=>  $decodedBooks, 'courses'=>$decodedCourses, 'user'=>auth()->user()]);    
        } else {
            return redirect('login');
        }        
    }

    public function addBookToCourse( Request $request ) {
        // dd($request);
        $bid = (int) $request->input('book_id');
        $cname = (int) $request->input('course_name');
        $course = Course::where('name', '=', $cname)->first();
        $course->books()->attach(
    		Book::where('id', '=', $bid)->first()
        );
        dd($course->books()->get());
    }
}