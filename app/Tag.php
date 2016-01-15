<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $timestamps = false;

    protected $fillable = ['name'];

    public function articles()
    {
        return $this->belongsToMany('App\Article');
    }
}
