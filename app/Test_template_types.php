<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test_template_types extends Model
{
	protected $table = 'test_template_types';

    protected $fillable = [
        'id', 'name'
    ];

  	public function template()
	{ 
	    return $this->belongsTo('App\Test_tempate');
	}
}
