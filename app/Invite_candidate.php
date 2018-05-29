<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invite_candidate extends Model
{
    
    protected $table = 'invite_candidates';
    protected $fillable = [
        'id','email' ,'recruiter_id', 'host_test_id'
    ];
}
