<?php namespace App\Repositories

interface RepositoryInterface {
	public function getAll();
	public function get($id);
	public function delete($id);
	public function create(array $data);
	public function update($id, array $data);
}