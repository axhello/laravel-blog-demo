<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="admin">
	<link rel="icon" href="{{asset('favicon.ico')}}">
	<title>@yield('title')Laravel Blog</title>

	<link href="{{ asset('home-assets/css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('admin-assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

</head>

<body>
	<div class="tmd-site">
		<header class="tmd-header bs-block">
			<div class="container">
				<div class="tmd-branding pull-left">
					<a href="{{ url('/') }}" rel="home" itemprop="headline">Moe Demo</a>
					<span class="bs-display-block">Just a use laravel site</span>
				</div>
				<nav class="bs-primary-menu pull-right bs-navbar">
					<ul class="nav nav-pills">

					@if(Auth::check())
					 <li class="dropdown">
					    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="false">
							{{ Auth::user()->name }} <b class="caret"></b>
					    </a>
					    <ul class="dropdown-menu">
					        <li>
								<a href="{{ url('/admin') }}">后台</a>
							</li>
							<li class="divider"></li>
							<li><a href="{{ url('/about') }}">关于</a></li>
							<li class="divider"></li>
							<li>
								<a href="{{ url('/auth/logout') }}">退出</a>
							</li>
					    </ul>

					</li>
						@else
							<li role="presentation"><a href="{{url('/')}}">Home</a></li>
							<li role="presentation"><a href="{{url('/about')}}">About</a></li>
						@endif
					</ul>
				</nav>
			</div>
		</header>
		<main class="tmd-main bs-block">
			<div class="container">

				@yield('content')

				<aside class="tmd-secondary col-sm-3 col-sm-offset">
					<div class="tmd-widget widget_search">
						<div>
							<form class="bs-form-icon bs-width-1-1" method="get" action="post" role="search">
								<input class="bs-width-1-1" type="search" placeholder="Search" value="" name="s">
								<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
							</form>
						</div>
					</div>
					<div class="tmd-widget bs-panel widget_recent-posts">
						<h3 class="bs-panel-title">Recent Posts</h3>
						<div class="bs-list">
							<ul>
								<li>阿里云9折优惠码：<strong>并没有╮(╯▽╰)╭</strong></li>
							</ul>
						</div>
					</div>
					<div class="tmd-widget bs-panel widget_recent-comments">
						<h3 class="bs-panel-title">Recent Comments</h3>
						<div class="bs-list">
							<ul>
								<li><a href="#">暂时没有什么</a></li>

							</ul>
						</div>
					</div>
					<div class="tmd-widget bs-panel widget_categories">
						<h3 class="bs-panel-title">Categories</h3>
						<div class="bs-list">
							<ul>
								@foreach($categories as $category)
									<li>
										<a href="{{ url('category/'.$category->id) }}">
											@if($category->pid) &nbsp;&nbsp;&nbsp;— @endif
											{{ $category->name }}
										</a>
									</li>
								@endforeach
							</ul>
						</div>
					</div>
					<div class="tmd-widget bs-panel widget_archives">
						<h3 class="bs-panel-title">Tags</h3>
						<div class="bs-list">
							<ul class="tags-list">
								@foreach($tags as $tag)
									<li class="tags">
										<a class="label label-primary" href="{{url('tag/'.$tag->id)}}">{{$tag->name}}</a>
									</li>
								@endforeach
							</ul>
						</div>
					</div>
				</aside>

			</div>
	</div>
		</main>
		<footer class="tmd-footer bs-block" >
			<div class="container">
				<div class="uk-clearfix uk-text-small uk-text-muted">
					<span class="uk-align-medium-left"><strong>Copyright © 2015</strong> <a href="//ciyuanai.net" >Axhello</a>. All rights reserved.</span>
					<span class="uk-align-medium-right uk-margin-bottom-remove">
					Beans theme for Laravel.</span>
				</div>
			</div>
		</footer>
	</div>
<!--- Name Field --->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('home-assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin-assets/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- 多说js加载开始，一个页面只需要加载一次 -->
	<script type="text/javascript">
		var duoshuoQuery = {short_name:"laravelblog"};
		(function() {
			var ds = document.createElement('script');
			ds.type = 'text/javascript';ds.async = true;
			ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
			ds.charset = 'UTF-8';
			(document.getElementsByTagName('head')[0]
			|| document.getElementsByTagName('body')[0]).appendChild(ds);
		})();
	</script>
</body>
</html>
