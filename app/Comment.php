<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'post_id',
        'content'
    ];
    protected $with=['username'];

    public function username() {
        return $this->hasOne("App\User",'id','user_id')->select(['id','name']);
    }

    public static function checkWhoUpdated($post){
        $user = auth()->user();
        if ($post['user_id'] == $user['id'] || $user['role'] === 'admin')
        {
            return true;
        } else {
            return false;
        }
    }
}
