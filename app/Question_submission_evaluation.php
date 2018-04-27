<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question_submission_evaluation extends Model
{
    protected $table = 'question_submission_evaluations';
    protected $fillable = [
        'id','question_id','submission_evaluation_title','weightage'
    ];

     public function questions()
	{ 
	    return $this->belongsTo('App\Question');
	} 
}
