<?php

namespace App\Review;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
    	'student_id', 
    	'book_id', 
    	'rating', 
    	'textReview'
    ];
}
