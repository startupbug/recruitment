<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Public_view_page extends Model
{
    protected $table = 'public_view_page';

    protected $fillable = [
        'template_id', 'page_name', 'page_detail'
    ];
}
