@extends('admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">分类管理</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="panel panel-default">

        <div class="panel-heading">
            添加分类表单
        </div>
        <div class="panel-body content-form">
            <div class="col-lg-12">
                {!! Form::open( array('url' => route('admin.category.store'), 'method' => 'post') ) !!}
                <div class="form-group">
                    <label>标题</label>
                    <span class="require">(*)</span>
                    <input name="name" class="form-control title" placeholder="请输入标题">
                </div>
                <div class="form-group">
                    <label>别名</label>
                    <input name="slug" class="form-control title" placeholder="别名">
                </div>
                <div class="form-group">
                    <label>选择父类</label>
                    <select class="form-control" name="pid" id="pid">
                        <option value="0">无父级</option>
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

                <input type="submit" name="submit" class="btn btn-primary" value="提交">
                {!!Form::close()!!}
            </div>
        </div>
    </div>
@endsection