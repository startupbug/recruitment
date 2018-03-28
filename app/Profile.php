<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	protected $table = 'profiles';

    protected $fillable = [
        'user_id', 'phone', 'gender', 'd_o_b', 'profile_pic'
    ];
    //User Model Relationship function
	public function user()
	{ 
	    return $this->belongsTo('App\User');
	}
}
