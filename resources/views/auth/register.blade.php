@extends('app')

@section('content')
	<div class="ui middle aligned center aligned grid">
		<div class="column">
			<h2 class="ui teal image header">

				<div class="content">
					Register Account
				</div>
			</h2>
			<form class="ui large form" role="form" method="POST" action="{{ url('/auth/register') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="ui stacked segment">
					<div class="field">
						<div class="ui left icon input">
							<i class="user icon"></i>
							<input type="text" name="name" placeholder="Username" value="{{ old('name') }}">
						</div>
					</div>
					<div class="field">
						<div class="ui left icon input">
							<i class="user icon"></i>
							<input type="email" name="email" placeholder="E-mail">
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

					<button type="submit" class="ui fluid large teal submit button">Register</button>
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
				已有账号? <a href="{{ url('/auth/login') }}">登录</a>
			</div>
		</div>
	</div>
@endsection
