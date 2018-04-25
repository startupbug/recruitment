<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Templates_test_setting extends Model
{
    protected $table = 'templates_test_settings';

    protected $fillable = [
        'id', 'test_templates_id', 'test_template_types_id','webcam_id','request_resume','mandatory_resume','email_verification'
    ];     
}
