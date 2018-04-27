<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template_setting_message extends Model
{
    protected $table = 'template_setting_messages';

    protected $fillable = [
        'id', 'test_templates_id', 'setting_message'
    ]; 
}
