<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 后台</title>

    <link href="{{ asset('home-assets/css/app.css') }}" rel="stylesheet">
    <link href="//cdn.bootcss.com/semantic-ui/2.1.8/semantic.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            background-color: #DADADA;
        }

        body > .grid {
            height: 100%;
        }

        .image {
            margin-top: -100px;
        }

        .column {
            max-width: 450px;
        }

        .cbox {
            margin: .6em;
        }

        .ahref {
            font-size: 14px;
        }

        .ui.form .error.message, .ui.form .success.message, .ui.form .warning.message {
            /*display: block!important;*/
        }
    </style>

    <!-- Fonts -->
    <!-- <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
                <li><a href="http://ciyuanai.net" target="_blank">次元爱</a></li>
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
<script src="//cdn.bootcss.com/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script src="//cdn.bootcss.com/semantic-ui/2.1.8/components/form.js"></script>
<script src="//cdn.bootcss.com/semantic-ui/2.1.8/components/transition.js"></script>
<script>
$(document).ready(function () {
    $('.ui.form').form({
        fields: {
            name: {
                dentifier: 'name',
                rules: [{
                        type: 'empty',
                        prompt: '请输入用户名!'
                    }, {
                        type: 'length[4]',
                        prompt: '用户名至少在3位以上!'
                    }]
            },
            email: {
                identifier: 'email',
                rules: [{
                        type: 'empty',
                        prompt: '请输入邮箱!'
                    }, {
                        type: 'email',
                        prompt: '请检查邮箱是否正确!'
                    }]
            },
            password: {
                identifier: 'password',
                rules: [{
                        type: 'empty',
                        prompt: '请输入您的密码!'
                    }, {
                        type: 'length[6]',
                        prompt: '密码长度应大于6位!'
                    }]
            },
            password2: {
                identifier: 'password_confirmation',
                rules: [{
                        type: 'match[password]',
                        prompt: '输入的密码与之前的不同!'
                    }]
            }
        }
    });
});
</script>
</body>
</html>