@extends('admin')

@section('content')

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">分类列表</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <table class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>名称</th>
                    <th>别名</th>
                    <th>操作</th>
                </tr>

                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>
                            @if($category->pid) &nbsp;&nbsp;&nbsp;— @endif
                            {{ $category->name }}
                        </td>
                        <td>{{ $category->slug }}</td>

                        <td>
                            <a href="{{ url('admin/category/'.$category->id.'/edit')  }}" class="btn btn-info btn-primary btn-sm iframe cboxElement"><span class="glyphicon glyphicon-pencil"></span> 编辑</a>
                            <a href="{{ url('admin/category/destroy/'.$category->id)  }}" class="btn btn-info btn-danger btn-sm iframe cboxElement"><span class="glyphicon glyphicon-trash"></span> 删除</a>
                        </td>
                    </tr>
                @endforeach

            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->


@endsection
