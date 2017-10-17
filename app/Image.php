<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['article_id','image'];

    public function imagephoto()    {
        return belongsTo('App\Article','article_id');
    }
}
