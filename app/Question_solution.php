<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question_solution extends Model
{
    protected $table = 'question_solutions';
    protected $fillable = [
       'id', 'question_id', 'text', 'code', 'url', 'media'
    ];
     public function questions()
	{ 
	    return $this->belongsTo('App\Question');
	} 
}
