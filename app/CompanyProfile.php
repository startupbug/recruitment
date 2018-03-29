<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
   protected $table = 'company_profiles';

    protected $fillable = [
        'user_id'
    ];
    //User Model Relationship function
	public function user()
	{ 
	    return $this->belongsTo('App\User');
	}
}
