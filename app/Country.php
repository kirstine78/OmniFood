<?php

namespace OmniFood;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	/**
	 * returns foods for this country for the user
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function foods() {
		// writing: Food::class   is equivalent to: 'OmniFood\Food'
		return $this->hasMany('OmniFood\Food')->where('user_id', '=', \Auth::id());	
	}
	
	
	/**
	 * return countries that have foods for a certain user
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public static function countriesThatHaveFoodsForUser() {
		return Country::whereHas('foods', function($query){
			$query->where('user_id', '=', \Auth::id());
		})->orderBy('name', 'asc')->get();
	}
}
