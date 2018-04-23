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
}
