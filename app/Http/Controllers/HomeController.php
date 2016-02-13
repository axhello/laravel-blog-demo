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
        $tags = Tag::all();

        return view('home.index',compact('articles','categories','tags'));

    }


    public function show($id)
    {
        $article = Article::findOrFail($id);
        $categories = $this->categories();
        $tags = Tag::all();
        return view('home.single',compact('article','categories','tags'));
    }

    public function category($id)
    {
        $categories = $this->categories();
        $articles =  Category::findOrFail($id)->articles()->orderBy('id', 'desc')->paginate(8);
        $category = Category::findOrFail($id);
        $tags = Tag::all();
        return view('home.category',compact('categories','articles','category','tags'));
    }

    public function tag($id)
    {
        $categories = $this->categories();
        $articles = Tag::findOrFail($id)->articles()->orderBy('id', 'desc')->paginate(8);
        $tag = Tag::findOrFail($id);
        $tags = Tag::all();
        return view('home.tag',compact('categories','tag','articles','tags'));
    }

}
