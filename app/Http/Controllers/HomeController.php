<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Tag;
use App\Http\Requests;

class HomeController extends BaseController
{
    public function index()
    {

        $categories = $this->categories();
        $articles = Article::orderBy('id', 'desc')->paginate(8);
        return view('home.index',compact('articles','categories'));

    }


    public function show($id)
    {
        $article = Article::findOrFail($id);
        $categories = $this->categories();
        return view('home.single',compact('article','categories'));
    }

    public function category($id)
    {
        $categories = $this->categories();
        $articles =  Category::findOrFail($id)->articles()->orderBy('id', 'desc')->paginate(8);
        $category = Category::findOrFail($id);
        return view('home.category',compact('categories','articles','category'));
    }

    public function tag($id)
    {
        $categories = $this->categories();
        $articles = Tag::findOrFail($id)->articles()->orderBy('id', 'desc')->paginate(8);
        $tag = Tag::findOrFail($id);
        return view('home.tag',compact('categories','tag','articles'));
    }

}
