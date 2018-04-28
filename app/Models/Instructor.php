<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $fillable = ['fName', 'lName'];

    public function courses() {
    	return $this->belongsToMany('App\Models\Course', 'instructor_course', 'instructor_id', 'course_id');
    }

    public function user() {
		return $this->belongsToMany('App\User', 'instructor_user', 'instructor_id', 'user_id');
	}
}
