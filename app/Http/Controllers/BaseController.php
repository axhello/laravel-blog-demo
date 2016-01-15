<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;

class BaseController extends Controller
{
    //获取分类
    public function  categories()
    {
        return Category::getSortedCategories();
    }
}
