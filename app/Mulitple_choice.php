<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mulitple_choice extends Model
{
    protected $table = 'mulitple_choices';
    protected $fillable = [
        'id','question_id', 'choice', 'partial_marks', 'status'
    ];

     public function questions()
	{ 
	    return $this->belongsTo('App\Question');
	} 
}
