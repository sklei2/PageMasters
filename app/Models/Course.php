<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'description'];

    public function books() {
    	return $this->belongsToMany('App\Models\Book', 'course_book', 'course_id', 'book_id');
    }
}
