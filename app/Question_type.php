<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question_type extends Model
{
    protected $table = 'question_types';
    protected $fillable = [
       'id', 'type_name'
    ];
}
