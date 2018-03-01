<?php 

namespace App\Models

class Course {
	public $id;
	public $description
	public array $books

	public function __construct($id, $description, array $books) {
		$this->id = $id;
		$this->description = $description;
		$this->books = $books;
	}
}