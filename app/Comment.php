<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'topic_id',
        'content'
    ];
    public static function validate($data)
    {
        $dataOut['user_id'] = (isset($data['user_id']))?(int)$data['user_id']:false;
        $dataOut['content'] = (isset($data['content']))?strip_tags($data['content']):false;
        foreach($dataOut as $elem) {
            if (!$elem) {
                return false;
            }
        }
        return $dataOut;
    }
}
