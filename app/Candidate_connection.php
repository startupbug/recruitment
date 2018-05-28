<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate_connection extends Model
{
    protected $table = 'candidate_connections';
    protected $fillable = [
        'id','user_id', 'facebook_url','github_url','twitter_url','blog_url','linkedin_url','website_url'
    ]; 
}
