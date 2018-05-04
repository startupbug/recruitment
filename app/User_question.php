<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_question extends Model
{
    protected $table = 'user_setting_questions';
    protected $fillable = [
       'id', 'user_id', 'format_setting_id', 'template_id', 'question', 'support_text', 'knock_out', 'mandatory'
    ];
}
