<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="admin">
	<link rel="icon" href="{{asset('favicon.ico')}}">

	<title>@yield('title')Laravel Blog</title>

	<!-- Bootstrap core CSS -->
	<link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="{{ asset('home-assets/css/main.css') }}" rel="stylesheet">

	<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
	<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	<script src="{{ asset('home-assets/js/ie-emulation-modes-warning.js') }}"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<div class="tmd-site">
		<header class="tmd-header bs-block">
			<div class="container">
				<div class="tmd-branding pull-left">
					<a href="{{ url('/') }}" rel="home" itemprop="headline">Moe Demo</a>
					<span class="bs-display-block">Just use laravel site</span>
				</div>
				<nav class="bs-primary-menu pull-right bs-navbar">
					<ul class="nav nav-pills">

					@if(Auth::check())
					 <li class="dropdown">
					    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="false">
					        Account <b class="caret"></b>
					    </a>
					    <ul class="dropdown-menu">
					        <li><a tabindex="-1" href="{{ url('/admin') }}">后台</a></li>
							<li class="divider"></li>
							<li><a tabindex="-1" href="{{ url('/about') }}">关于</a></li>
							<li class="divider"></li>
							<li><a tabindex="-1" href="{{ url('/auth/logout') }}">退出</a></li>

					    </ul>
					</li>
						@else
							<li role="presentation" class="active"><a href="{{url('/')}}">Home</a></li>
							<li role="presentation"><a href="{{url('/about')}}">About</a></li>
						@endif
					</ul>
				</nav>
			</div>
		</header>
		<main class="tmd-main bs-block">
			<div class="container">

			@yield('content')

				@include('home.sidebar')

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
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="{{ asset('home-assets/js/ie10-viewport-bug-workaround.js') }}"></script>
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
