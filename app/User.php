<?php

namespace OmniFood;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    
    /**
     * Get all of the foods for the user.
     */
    public function foods()
    {
    	return $this->hasMany('OmniFood\Food');
    }
    
    
    /**
     * Get all of the countries for the user.
//      */
//     public function countries()
//     {
//     	return $this->hasManyThrough('OmniFood\Country', 'OmniFood\Food');
//     }
}
