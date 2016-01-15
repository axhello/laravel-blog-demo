@extends('admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">标签管理</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="panel panel-default">

        <div class="panel-heading">
            编辑标签表单
        </div>
        <div class="panel-body content-form">
            <div class="col-lg-12">
                {!! Form::open( array('url' => route('admin.tags.update',$tag->id), 'method' => 'put') ) !!}
                <div class="form-group">
                    <label>标题</label>
                    <span class="require">(*)</span>
                    <input name="name" class="form-control title" placeholder="请输入标题" value="{{$tag->name}}">
                </div>
                <input type="submit" name="submit" class="btn btn-primary" value="提交">
                {!!Form::close()!!}
            </div>
        </div>
    </div>
@endsection