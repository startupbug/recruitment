<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question_tag extends Model
{
    protected $table = 'question_tags';
    protected $fillable = [
       'id', 'tag_name'
    ];
}
