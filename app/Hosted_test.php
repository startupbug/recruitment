<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hosted_test extends Model
{
    protected $table = 'hosted_tests';

    protected $fillable = [
       'id', 'host_name', 'test_template_id', 'cut_off_marks', 'test_open_date', 'test_open_time', 'test_close_date', 'test_close_time', 'time_zone'
    ];
}
