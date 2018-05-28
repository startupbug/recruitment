<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate_education_info extends Model
{
    protected $table = 'candidate_education_infos';
    protected $fillable = [
        'id','user_id', 'qualification','school','date_from','date_to','percentage','cgpa','max_cgpa','current_status'
    ];   
}
