<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['student_id'];

    public function student() {
    	return $this->belongsTo('App\Models\Student');
    }

    public function cartItems() {
    	return $this->hasMany('App\Models\CartItem');
    }

    protected static function boot() {
    	parent::boot();

    	// basically once the delete is called on this model,
    	// it will remove all the related models
    	static::deleting(function($cart) {
    		$cart->cartItems()->delete();
    	});
    }
}