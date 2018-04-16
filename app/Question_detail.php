<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question_detail extends Model
{
    protected $table = 'question_details';
    protected $fillable = [
       'id', 'question_id', 'tag_id', 'media', 'marks', 'negative_marks', 'provider', 'author'
    ];

    public function question()
	{ 
	    return $this->belongsTo('App\Question');
	}
}
