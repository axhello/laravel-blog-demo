@extends('app')

@section('content')
	<div class="ui middle aligned center aligned grid">
		<div class="column">
			<h2 class="ui teal image header">
				<div class="content">
					Login to your account
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
			{!! Form::open(['url'=>'/auth/login','class'=>'ui large form']) !!}
			<div class="ui stacked segment">
				<div class="field">
					<div class="ui left icon input">
						<i class="mail icon"></i>
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
                
                {!! Form::submit('Login',['class'=>'ui fluid large teal submit button']) !!}
			</div>

			<div class="ui error message">
			</div>
			{!! Form::close() !!}


			<div class="ui message">
				没有账号? <a href="{{ url('/auth/register') }}">注册</a>
			</div>
		</div>
	</div>
@endsection
