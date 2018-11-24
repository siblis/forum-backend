<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Topic
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $content
 * @property int $author_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int $status
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Topic whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Topic whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Topic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Topic whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Topic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Topic whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Topic whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Topic whereUpdatedAt($value)
 * @property-read \App\Author $author
 */
class Topic extends Model
{
    protected $table='topics';
    protected $fillable=['title','description','content','author_id'];

    /**
     * @return array
     */
    public static function rules(){
        return [
            'author'=>'required|max:100',
            'title'=>'required|max:255',
            'content'=>'required',
        ];
    }

    public function addTopic($post){
        $post['author_id']=Author::getOrAddAuthor($post['author']);
        $this->fill($post);
        $this->save();

    }

    public function author(){
        return $this->hasOne('App\Author','id','author_id');
    }

    public function comments(){
        return $this->hasMany('App\Comment','topic_id','id');
    }
}
