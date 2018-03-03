<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['fName', 'lName'];

    public function books() {
    	return $this->belongsToMany('App\Models\Book', 'student_book', 'student_id', 'book_id');
    }

    public function courses() {
    	return $this->belongsToMany('App\Models\Course', 'student_course', 'student_id', 'course_id');
    }
}
