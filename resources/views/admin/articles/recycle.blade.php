@extends('admin')
@section('content')
    <ul class="breadcrumb">
        <li><a href="{{url('/admin')}}">首页</a></li>
        <li>文章管理</li>
        <li>回收站</li>
    </ul>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">文章列表</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <table class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>标题</th>
                    <th>作者</th>
                    <th>更新时间</th>
                    <th>操作</th>
                </tr>

                @foreach($articles as $article)
                    <tr>
                        <td>{{$article->id}}</td>
                        <td><a href="#">{{ $article->title }}</a></td>
                        <td><a href="#">{{ $article->user['name']}}</a></td>

                        <td>{{ $article->updated_at }}</td>
                        <td>
                            <a href="{{ url('admin/article/restore/'.$article->id)  }}" class="btn btn-info btn-primary btn-sm iframe cboxElement"><span class="glyphicon glyphicon-pencil"></span> 恢复</a>
                            <a href="{{ url('admin/article/delete/'.$article->id)  }}" class="btn btn-info btn-danger btn-sm iframe cboxElement"><span class="glyphicon glyphicon-trash"></span> 彻底删除</a>
                        </td>
                    </tr>
                @endforeach

            </table>
        </div><!-- /.box-body -->
        <div class="box-footer clearfix">
            <div class="pull-right">
                {!! $articles->render() !!}
            </div>
        </div>
    </div><!-- /.box -->


@endsection