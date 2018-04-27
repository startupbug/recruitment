<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coding_entry extends Model
{
    protected $table = 'coding_entries';
    protected $fillable = [
        'id','question_id', 'input','output'
    ];

     public function questions()
	{ 
	    return $this->belongsTo('App\Question');
	} 
}
