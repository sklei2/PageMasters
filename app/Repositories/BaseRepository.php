<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

abstract class BaseRepository {

	protected $model;

	public function __construct(Model $model) {
		$this->model = $model;
	}
}