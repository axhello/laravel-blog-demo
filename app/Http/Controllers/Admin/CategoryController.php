<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Support\Facades\Input;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::getSortedCategories();
        return view('admin.categories.index',compact('categories'));
    }

    public function create()
    {
        $categories = Category::getLeveledCategories();
        return view('admin.categories.create',compact('categories'));
    }

    public function store(Request $request)
    {
        //dd(Input::get());
        $category = Category::create(Input::get());
        if($category){
            return redirect('admin/category')->with('message', '成功发布！');
        }else{
            return back()->withInput()->with('errors','保存失败！');
        }
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::getLeveledCategories();
        return view('admin.categories.edit',compact('categories','category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update(Input::get());
        if($category){
            return redirect('admin/category')->with('message', '更新发布！');
        }else{
            return back()->withInput()->with('errors','保存失败！');
        }
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if($category->delete()){
            return back()->with('message', '删除成功！');
        }else{
            return back()->withInput()->with('errors','删除失败！');
        }
    }
}
