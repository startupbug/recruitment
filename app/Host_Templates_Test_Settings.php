<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Host_Templates_Test_Settings extends Model
{
    //host_templates_test_settings
    protected $table = 'host_templates_test_settings';
    protected $fillable = [
       'id', 'host_id', 'webcam_id', 'request_resume', 'mandatory_resume', 'email_verification'
    ];
}
