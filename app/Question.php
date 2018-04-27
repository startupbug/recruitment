<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
   	protected $table = 'questions';
    protected $fillable = [
        'id','user_id', 'question_level_id','question_state_id','question_type_id','question_statement','section_id'
    ];

    public function section()
	{ 
        return $this->belongsTo('App\Section');
	} 
	public function question_detail()
    {   
        return $this->hasOne('App\Question_detail');
    } 
    public function question_solution()
    {   
        return $this->hasOne('App\Question_solution');
    } 

    public function question_type()
    {   
        return $this->belongsTo('App\Question_type');
    }

    public function question_state()
    {   
        return $this->belongsTo('App\Question_state');
    }
    public function question_level()
    {   
        return $this->belongsTo('App\Question_level');
    }
    public function multiple_choice()
    {           
        return $this->hasMany('App\Mulitple_choice');
    } 
    public function coding_language()
    {           
        return $this->hasMany('App\Coding_question_language');
    } 
    public function coding_entry()
    {           
        return $this->hasMany('App\Coding_entry');
    } 
    public function submission_evaluation()
    {           
        return $this->hasMany('App\Question_submission_evaluation');
    } 
    public function submission_resource()
    {           
        return $this->hasMany('App\Questions_submission_resource');
    } 
}
