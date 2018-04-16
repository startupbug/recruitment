<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'sections';

    protected $fillable = [
        'id', 'section_name', 'template_id','order_number'
    ]; 

    public function template()
	{ 
	    return $this->belongsTo('App\Test_template');
	}   

	 public function questions()
    {           
        return $this->hasMany('App\Question', 'section_id');
    }
}
