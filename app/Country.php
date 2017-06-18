<?php

namespace OmniFood;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function foods() {
		// writing: Food::class   is equivalent to: 'OmniFood\Food'
		return $this->hasMany('OmniFood\Food');
	}
}
