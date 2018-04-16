<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question_level extends Model
{
    protected $table = 'question_levels';
    protected $fillable = [
        'id', 'level_name'
    ];
}
