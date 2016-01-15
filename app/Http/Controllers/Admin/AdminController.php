<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Tag;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class AdminController extends Controller
{

    public function index()
    {
        $article_count = Article::count();
        $category_count = Category::count();
        $tag_count = Tag::count();
        $user_count = User::count();
        return view('admin.console',compact('article_count','category_count','tag_count','user_count'));
    }

}
