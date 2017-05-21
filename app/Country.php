<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function foods() {
		// writing: Food::class   is equivalent to: 'App\Food'
		return $this->hasMany('App\Food');
	}
}
