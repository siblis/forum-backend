<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Author
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Author whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Author whereName($value)
 * @mixin \Eloquent
 */
class Author extends Model
{
    protected $table='authors';
    public $timestamps=false;

    /**
     * @param $name
     * @return int
     */
    public static function getOrAddAuthor($name){
        $name=ucfirst(strtolower($name));
        if($id=self::select('id')->where('name',$name)->first()){
            return $id->id;
        }
        $author=new Author();
        $author->name=$name;
        $author->save();
        return $author->id;
    }
}
