@extends('app')

@section('content')
	<div class="ui middle aligned center aligned grid">
		<div class="column">
			<h2 class="ui teal image header">

				<div class="content">
					Login to your account
				</div>
			</h2>
			<form class="ui large form" role="form" method="POST" action="{{ url('/auth/login') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="ui stacked segment">
					<div class="field">
						<div class="ui left icon input">
							<i class="user icon"></i>
							<input type="text" name="email" placeholder="E-mail">
						</div>
					</div>
					<div class="field">
						<div class="ui left icon input">
							<i class="lock icon"></i>
							<input type="password" name="password" placeholder="Password">
						</div>
					</div>
						<div class="ui checkbox">
							<input type="checkbox" name="remember">
							<label>记住我！</label>
						</div>
						<a class="ahref" href="{{ url('/password/email') }}">忘记密码?</a>
					{{--<div class="ui fluid large teal submit button">Login</div>--}}
					<button type="submit" class="ui fluid large teal submit button">Login</button>
				</div>

				<div class="ui error message">
						<ul class="list">
							@if (count($errors) > 0)
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							@endif
						</ul>
				</div>
			</form>

			<div class="ui message">
				没有账号? <a href="{{ url('/auth/register') }}">注册</a>
			</div>
		</div>
	</div>
@endsection
