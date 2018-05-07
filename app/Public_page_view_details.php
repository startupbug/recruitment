<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Public_page_view_details extends Model
{
     protected $table = 'public_page_view_details';

    protected $fillable = [
        'template_id', 'cover_tag_id', 'image'
    ];
}
