<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Templates_mail_setting extends Model
{
    protected $table = 'templates_mail_settings';

    protected $fillable = [
        'id', 'test_templates_id', 'receiver_email','candidate_mail_setting','include_questionnaire', 'email_report_status', 'percentage_required'
    ]; 
}
