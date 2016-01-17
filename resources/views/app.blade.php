<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 后台</title>

    <link href="{{ asset('admin-assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="//cdn.bootcss.com/semantic-ui/2.1.8/semantic.min.css" rel="stylesheet">
    <link href="{{ asset('home-assets/css/blog.css') }}" rel="stylesheet">

</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"></a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{url('/')}}">首页</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a href="//ciyuanai.net" target="_blank">次元爱</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="/auth/login">登陆</a></li>
                    <li><a href="/auth/register">注册</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/auth/logout">登出</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>


@yield('content')


<!-- Scripts -->
<script src="{{ asset('home-assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin-assets/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('home-assets/js/blog.js') }}"></script>
<script src="{{ asset('home-assets/js/form.min.js') }}"></script>
<script src="{{ asset('home-assets/js/transition.min.js') }}"></script>
</body>
</html>