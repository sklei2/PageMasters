<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = [
    	'book_quantity'
    ];

    public function cart() {
    	return $this->belongsTo('App\Models\Cart');
    }

    public function book() {
    	return $this->belongsTo('App\Models\Book');
    }
}
