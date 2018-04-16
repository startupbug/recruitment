<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question_state extends Model
{
    protected $table = 'question_states';
    protected $fillable = [
       'id', 'state_name'
    ];
}
