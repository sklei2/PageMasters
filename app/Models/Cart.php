<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function student() {
    	return $this->belongsTo('App\Models\Student');
    }

    public function cartItems() {
    	return $this->hasMany('App\Models\CartItem');
    }
}