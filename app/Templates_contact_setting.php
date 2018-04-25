<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Templates_contact_setting extends Model
{
    protected $table = 'templates_contact_settings';

    protected $fillable = [
        'id', 'test_templates_id', 'email_visible','contact_visible'
    ];  
}
