<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cover_image_tag extends Model
{
    
    protected $table = 'cover_image_tags';
    protected $fillable = [
        'template_id','tag_name'
    ];
}
