<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teststatus extends Model
{
	protected $table = 'test_statuses';

    protected $fillable = [
        'id', 'name'
    ];
}
