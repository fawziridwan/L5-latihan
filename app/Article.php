<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title','content','writer'];

    public function comments()   {
        return $this->hasMany('App\Comment', 'article_id');
    }    

	public function photos()   {
        return $this->hasMany('App\Image', 'article_id');
    }        

    public static function valid()	{
    	return array('content'=>'required');
    }
}
 