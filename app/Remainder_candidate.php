<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remainder_candidate extends Model
{
    protected $table = 'remainder_candidates';
     protected $fillable = [
        'id','email' ,'recruiter_id', 'host_test_id','body','subject',
    ];
}
