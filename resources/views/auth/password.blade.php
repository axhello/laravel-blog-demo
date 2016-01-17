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
		 {!! Form::open(['url'=>'/password/email','class' => 'ui large form']) !!}
			<div class="ui stacked segment">
				<div class="field">
					<div class="ui left icon input">
						<i class="user icon"></i>
						<input type="email" name="email" value="{{ old('email') }}" placeholder="E-Mail Address">
					</div>
				</div>
				{!! Form::submit('Send',['class'=>'ui fluid large teal submit button']) !!}
			</div>
		  {!! Form::close() !!}

	</div>
	</div>
@endsection
