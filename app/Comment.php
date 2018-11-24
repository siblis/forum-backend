<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Comment
 *
 * @property int $id
 * @property int $topic_id
 * @property string $text
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereTopicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Comment extends Model
{
    protected $table='comments';
    protected $fillable=['text','topic_id','author_id'];

    public static function rules(){
        return [
            'author'=>'required|max:100',
            'text'=>'required',
            'topic_id'=>'safe'
        ];
    }
    public function addComment($post){
        $post['author_id']=Author::getOrAddAuthor($post['author']);
        $this->fill($post);
        $this->save();
        $topic=Topic::find($post['topic_id']);
        $topic->touch();
    }

    public function author(){
        return $this->hasOne('App\Author','id','author_id');
    }
}
