<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'description',
        'content',
        'tag_id'
    ];
}
