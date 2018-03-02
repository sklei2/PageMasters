<?php

namespace App\Http\Controllers\ApiControllers;

use App\Repositories\BookRepository\BookRepositoryInterface;
use App\Models\Book as Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
	private $book;

	public function __construct(BookRepositoryInterface $book) {
		$this->book = $book;
	}

    public function create(Request $request) {
    	$book = $this->book->create($request->all());
        $code = $book != null ? 200 : 400;
        return response($book, $code);
    }

    public function getAll() {
    	return $this->book->getAll();
    }

    public function get($id) {
        $book = $this->book->get($id);
        $code = $book != null ? 200 : 404;
    	return response($book, $code);
    }

	public function update(Request $request, $id) {            
    	$success = $this->book->update($id, $request->all());
        $code = $success ? 200 : 400;
        return response($code);
    }

    public function delete($id) {
    	$success = $this->book->delete($id);
        $code = $success ? 200 : 404;
        return response($code);
    }
    
}
