<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_format_detail extends Model
{
    protected $table = 'user_format_details';
    protected $fillable = [
       'id', 'user_id', 'question_id', 'checked', 'max', 'min', 'placeholder', 'option','answer'
    ];
}
