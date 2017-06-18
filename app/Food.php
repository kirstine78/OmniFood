<?php

namespace OmniFood;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
	/**
	 * get the country that owns the food
	 */
	public function country() {
		// writing: Country::class   is equivalent to: 'OmniFood\Country'
		return $this->belongsTo('OmniFood\Country');
	}
	
	/**
	 * Get the images for the food entry.
	 */
	public function images()
	{
		return $this->hasMany('OmniFood\Image');
	}
	
	
}
