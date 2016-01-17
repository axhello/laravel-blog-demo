@extends('app')

@section('content')
	<div class="ui middle aligned center aligned grid">
		<div class="column">
			<h2 class="ui teal image header">

				<div class="content">
					Register Account
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
			 {!! Form::open(['url'=>'/auth/register','class' => 'ui large form']) !!}
			<div class="ui stacked segment">
				<div class="field">
					<div class="ui left icon input">
						<i class="user icon"></i>
						<input type="text" name="name" placeholder="Username" value="{{ old('name') }}">
					</div>
				</div>
				<div class="field">
					<div class="ui left icon input">
						<i class="mail icon"></i>
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

				{!! Form::submit('Register',['class'=>'ui fluid large teal submit button']) !!}
			</div>

			<div class="ui error message">

			</div>
			  {!! Form::close() !!}

			<div class="ui message">
				已有账号? <a href="{{ url('/auth/login') }}">登录</a>
			</div>
		</div>
	</div>
@endsection
