<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = [
		'id','article_id','content','user'
	];

    public static function valid()  {
        return array(
            'content'=>'required'  
        );
    }
    // relation articles -> comment
    public function article()   {
        return $this->belongsTo('App\Article', 'article_id');
    }
}
 