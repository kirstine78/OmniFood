<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
	/**
	 * get the country that owns the food
	 */
	public function country() {
		// writing: Country::class   is equivalent to: 'App\Country'
		return $this->belongsTo('App\Country');
	}
	
	/**
	 * Get the images for the food entry.
	 */
	public function images()
	{
		return $this->hasMany('App\Image');
	}
	
	
}
