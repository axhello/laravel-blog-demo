<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Article extends Model
{
    use SoftDeletes;

    protected $guarded = ['submit','tag_list'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
