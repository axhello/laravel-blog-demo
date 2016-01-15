<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::orderBy('id','desc')->paginate(15);
        return view('admin.tags.index',compact('tags'));
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('admin.tags.edit',compact('tag'));

    }

    public function update(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->update(Input::get());
        if($tag->save()){
            return redirect('admin/tags')->with('message', '更新成功！');
        }else{
            return back()->withInput()->with('errors','更新失败！');
        }
    }

    //删除标签
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $articles = Article::all();
        foreach($articles as $article){
            $article_ids[] = $article->id;
        }
        //删除与文章关联的tag
        $tag->articles()->detach($article_ids);
        if($tag->delete()){
            return redirect('admin/tags')->with('message', '删除成功！');
        }else{
            return back()->withInput()->with('errors','保存失败！');
        }

    }
}
