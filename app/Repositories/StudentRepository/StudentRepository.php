<?php

namespace App\Repositories\StudentRepository;

use App\Repositories\StudentRepository\StudentRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Models\Student as Student;
use App\Models\Book;

class StudentRepository extends BaseRepository implements StudentRepositoryInterface {

	public function __construct(Student $student) {
		$this->model = $student;
	}

	public function updateBooks($id, array $attributes) {
        $user = $this->model->find($id);
        if ($user != null) {
            $index = 0;
            foreach($attributes['books'] as $book) {
                $user->books()->attach(Book::find($book));
                error_log($attributes['quantity'][$index]);
                $book = Book::find($book);
                $book->in_stock = $book->in_stock - $attributes['quantity'][$index];
                $book->save();
                $index++;
            }
            return $user->books;
        }
    }

    public function subtractFunds($id, array $attributes){
	    $user = $this->model->find($id);
	    if ($user != null) {
	        $user->account = $user->account - $attributes['amount'];
        }
        $user->save();
	    return $user;
    }
}