@extends('app')

@section('content')
	<div class="ui middle aligned center aligned grid">
		<div class="column">
			<h2 class="ui teal image header">

				<div class="content">
					Reset Your Password
				</div>
			</h2>
			@if ($errors->any())
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<ul style="text-align: left">
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
			<form class="ui large form" role="form" method="POST" action="{{ url('/password/reset') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="token" value="{{ $token }}">
				<div class="ui stacked segment">
					<div class="field">
						<div class="ui left icon input">
							<i class="user icon"></i>
							<input type="email" name="email" placeholder="E-Mail Address">
						</div>
					</div>
					<div class="field">
						<div class="ui left icon input">
							<i class="lock icon"></i>
							<input type="password" name="password" placeholder="Password">
						</div>
					</div>
					<div class="field">
						<div class="ui left icon input">
							<i class="lock icon"></i>
							<input type="password" name="password_confirmation" placeholder="Confirm Password">
						</div>
					</div>

					<button type="submit" class="ui fluid large teal submit button">Reset Password</button>
				</div>

				<div class="ui error message">

				</div>
			</form>

			<div class="ui message">
				已有账号? <a href="{{ url('/auth/login') }}">登录</a>
			</div>
		</div>
	</div>
@endsection
