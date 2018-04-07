<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test_template extends Model
{
	protected $table = 'test_templates';

    protected $fillable = [
        'id','user_id', 'template_type_id', 'title'
    ];

    public function template_type()
    {   
        return $this->hasOne('App\Test_template_types');
    } 
}
