@extends('admin')
@section('content')
    <ul class="breadcrumb">
        <li><a href="{{url('admin/console')}}">首页</a></li>
        <li>内容管理</li>
        <li>添加文章</li>
    </ul>
    <div class="box">

        <div class="box-header with-border">
            <h3 class="box-title">文章编辑</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            {!! Form::open( array('url' => route('admin.article.update',$article->id), 'method' => 'put') ) !!}
            <div class="form-group row">
                <div class="col-md-6">
                    <label>标题</label>
                    <span class="require">(*)</span>
                    <input name="title" class="form-control title" placeholder="请输入标题" value="{{$article->title}}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label>分类</label>
                    <span class="require">(*)</span>
                    <select class="form-control" name="category_id" id="category_id">
                        @foreach ($categories['top'] as $top_category)
                            <option value="{{ $top_category->id }}"
                                    @if(isset($article->category_id) && $top_category->id == $article->category_id)
                                    selected
                                    @endif
                                    >{{ $top_category->name }}</option>
                            @if(isset($categories['second'][$top_category->id]))
                                @foreach ($categories['second'][$top_category->id] as $scategory)
                                    <option value="{{ $scategory->id }}"
                                            @if(isset($article->category_id) && $scategory->id == $article->category_id)
                                            selected
                                            @endif
                                            >&nbsp;&nbsp;&nbsp;{{ $scategory->name }}</option>
                                @endforeach
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>内容</label>
                <span class="require">(*)</span>

                <div class="editor">
                    @include('editor::head')
                    {!! Form::textarea('content', $article->content, ['class' => 'form-control','id'=>'myEditor']) !!}
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    {!! Form::label('tag_list', '标签：') !!}
                    <select  id="tag_list" class="form-control" multiple="multiple" name="tag_list[]">
                        @foreach($tags as $tag)
                            <option value="{{$tag->id}}"  @if(in_array($tag->id,$article_tags)) selected @endif>{{$tag->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <div class="form-group row">
                <div class="col-md-4">
                    <span class="btn-space">
                        <input class="btn btn-primary" type="submit" name="submit" value="提交">
                    </span>
                </div>
            </div>
            {!!Form::close()!!}


        </div><!-- /.box-body -->
    </div><!-- /.box -->
@endsection

