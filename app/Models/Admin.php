<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
	protected $fillable = ['name'];

	public function user() {
		return $this->belongsToMany('App\Models\User', 'admin_user', 'admin_id', 'user_id');
	}
}
