<?php 

namespace App\Models

class Admin {
	public $id;
	public $name;

	public function __construct($id, $name) {
		$this->id = $id;
		$this->name = $name;
	}
}