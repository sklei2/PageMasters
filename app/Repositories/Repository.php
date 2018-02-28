<?php namespace App\Repositories

use App\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Model
use Illuminate\Container\Container as App;

/**
 * Abstract Repository Class that handles a lot of the common
 * functionality
 */
abstract class Repository implements RepositoryInterface {

	private $app;
	protected $model;

	public function __construct(App $app) {
		$this->app = $app;
		$this->makeModel();
	}

	abstract function model(); // Function that specifies what model we're using

	public function makeModel() {
		$model = $this->app->make($this->model());

		if(!$model instanceof Model){
			throw new Exception("Class {$this->model()} must be an instance of Eloquent\\Model");
		}
		return $this->model = $model;
	}
}