<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Category extends Model
{
    public $timestamps = false;
    protected $guarded = ['submit'];

    public function articles()
    {
        return $this->hasMany('App\Article','category_id','id');
    }
    public static function getLeveledCategories()
    {
        $categories = Category::all();
        $result = array();
        foreach ($categories as $category) {
            if ($category->pid == 0) {
                $result['top'][] = $category;
                foreach ($categories as $scategory) {
                    if ($scategory->pid == $category->id) {
                        $result['second'][$category->id][] = $scategory;
                    }
                }
            }
        }

        return $result;
    }

    public static function getSortedCategories()
    {
        /*return Cache::rememberForever('categories',function()
        {*/
            $categories = Category::all();
            $result = array();
            foreach ($categories as $category) {
                if ($category->pid == 0) {
                    $result[] = $category;
                    foreach ($categories as $scategory) {
                        if ($scategory->pid == $category->id) {
                            $result[] = $scategory;
                        }
                    }
                }
            }

            return $result;
        /*});*/

    }
}
