<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersInfo extends Model
{
    protected $fillable = ['avatar', 'full_name', 'phone', 'about', 'job', 'rating', 'rule'];
}
