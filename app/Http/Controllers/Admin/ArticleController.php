<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\Category;
use App\Tag;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('id','desc')->paginate(15);
        return view('admin.articles.index',compact('articles'));
    }

    public function create()
    {
        $tags = Tag::lists('name', 'id');
        $categories = Category::getLeveledCategories();
        return view('admin.articles.create',compact('categories','tags'));
    }

    public function store(Requests\ArticlesRequest $request)
    {
        $article = Article::create(Input::get());
        $tag_lists = Input::get('tag_list');
        $tag_list = empty($tag_lists) ? array() : $tag_lists;
        if($article){
            $this->attachTags($article, $tag_list);
            return redirect('admin/article')->with('message', '发布发布！');
        }else{
            return back()->withInput()->with('errors','保存失败！');
        }

    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::getLeveledCategories();
        $tags = Tag::all();
        $article_tags = Article::findOrFail($id)->tags->toArray();
        foreach ($article_tags as $article_tag){
            $ctags[]=$article_tag['pivot']['tag_id'];
        }
        $article_tags = empty($ctags) ? array('0') :$ctags;
        return view('admin.articles.edit',compact('categories','tags','article','article_tags'));

    }

    //更新
    public function update(Requests\ArticlesRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update(Input::get());
        $tag_lists = Input::get('tag_list');
        $tag_list = empty($tag_lists) ? array() : $tag_lists;
        if ($article->save()) {
            $this->syncTags($article, $tag_list);
            return redirect('admin/article')->with('message', '更新成功！');
        }else{
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    //软删除
    public function destroy($id)
    {
        $destory = Article::findOrFail($id)->delete();
        if ($destory) {
            return redirect('admin/article')->with('message', '已移至回收站！');
        }else{
            return Redirect::back()->withInput()->withErrors('删除失败！');
        }
    }

    //回收站文章
    public function recycle()
    {
        $articles = Article::onlyTrashed()->paginate(15);
        return view('admin.articles.recycle',compact('articles'));
    }

    //恢复文章
    public function restore($id)
    {
        $restore = Article::withTrashed()->where('id', $id)->restore();
        if($restore){
            return redirect('admin/article')->with('message', '恢复成功！');
        }else{
            return Redirect::back()->withInput()->withErrors('恢复失败！');
        }
    }

    //彻底删除
    public function  delete($id)
    {
        $delete = Article::withTrashed()->where('id', $id)->forceDelete();
        if($delete){
            return redirect('admin/article/recycle')->with('message', '删除成功！');
        }else{
            return Redirect::back()->withInput()->withErrors('删除失败！');
        }
    }

    //添加标签
    public function attachTags(Article $article, array $tags)
    {
        foreach ($tags as $key => $tag) {
            if (!is_numeric($tag)) {
                $newTag = Tag::create(['name' => $tag]);
                $tags[$key] = $newTag->id;
            }
        }
        $article->tags()->attach($tags);
    }

    //同步标签
    public function syncTags(Article $article, array $tags)
    {
        foreach ($tags as $key => $tag) {
            if (!is_numeric($tag)) {
                $newTag = Tag::create(['name' => $tag]);
                $tags[$key] = $newTag->id;
            }
        }
        $article->tags()->sync($tags);
    }

}
