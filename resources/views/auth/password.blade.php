@extends('app')

@section('content')
	<div class="ui middle aligned center aligned grid">
	<div class="column">
		<h2 class="ui teal image header">

			<div class="content">
				Reset Password
			</div>
		</h2>
		@if (session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
		@endif

		@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Whoops!</strong> There were some problems with your input.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<form class="ui large form" role="form" method="POST" action="{{ url('/password/email') }}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="ui stacked segment">
				<div class="field">
					<div class="ui left icon input">
						<i class="user icon"></i>
						<input type="email" name="email" value="{{ old('email') }}" placeholder="E-Mail Address">
					</div>
				</div>
				<button type="submit" class="ui fluid large teal submit button">Send</button>
			</div>
		</form>

		<div class="ui message">
			已有账号? <a href="{{ url('/auth/login') }}">登录</a>
		</div>
	</div>
	</div>
@endsection
