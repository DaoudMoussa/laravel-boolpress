<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
        'header', 'body', 'post_date', 'slug', 'author'
    ];
}
