@extends('admin')

@section('content')
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>{{$article_count}}<sup style="font-size: 20px">篇</sup></h3>
                  <p>文章</p>
                </div>
                <div class="icon">
                  <i class="ion ion-document"></i>
                </div>
                <a href="{{url('admin/article')}}" class="small-box-footer">更多信息 <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>{{$category_count}}<sup style="font-size: 20px">个</sup></h3>
                  <p>分类</p>
                </div>
                <div class="icon">
                  <i class="ion ion-document"></i>
                </div>
                <a href="{{url('admin/category')}}" class="small-box-footer">更多信息 <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>{{$tag_count}}<sup style="font-size: 20px">个</sup></h3>
                  <p>标签</p>
                </div>
                <div class="icon">
                  <i class="ion ion-tag"></i>
                </div>
                <a href="{{url('admin/tags')}}" class="small-box-footer">更多信息 <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>{{$user_count}}<sup style="font-size: 20px">个</sup></h3>
                  <p>用户</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person"></i>
                </div>
                <a href="#" class="small-box-footer">更多信息 <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
@stop