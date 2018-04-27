<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions_submission_resource extends Model
{
    protected $table = 'questions_submission_resources';
    protected $fillable = [
        'id','question_id','candidate_help_material_tests_id'
    ];

     public function questions()
	{ 
	    return $this->belongsTo('App\Question');
	} 
}
