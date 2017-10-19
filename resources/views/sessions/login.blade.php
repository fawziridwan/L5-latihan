@extends("layouts.index")
@section("content")
	<div class="container" style="text-align: center">
		<div class="row">
			{!! Form::open(['route' => 'login.store', 'class' => 'col s12 form-horizontal', 'role' => 'form']) !!}

			<div class="row">
				<div class="input-field col s12">
					{!! Form::label('email', 'Email', array('for'=>'email','class' =>'validate')) !!}
					{!! Form::text('email', null, array('class' => 'validate'))!!}
					<div class="input-field col s12">
						<div class="text-danger">{!! $errors->first('email') !!}</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					{!! Form::label('password', 'Password', array('for'=>'password','class' =>'validate')) !!}
					{!! Form::password('password', array('class' => 'validate')) !!}
					<div class="input-field col s12">
						<div class="text-danger">{!! $errors->first('password')!!}</div>
					</div>
				</div>
			<div class="clear"></div>
			</div>
			{{-- <div class="row">
					{!! Form::label('remember', 'Remember Me', array('for'=>'remember','class' =>'validate')) !!}
					{!! Form::checkbox('remember', null, array('class' => 'validate')) !!}
					<div class="input-field col s12">
					</div>
				<div class="clear"></div>
			</div> --}}

			<div class="row">
				<div class="col-lg-3"></div>
					<div class="input-field col s12">
				{!! Form::submit('Login', array('class' => 'btn btn-raised btn-primary')) !!}
				<br />
				{!! link_to(route('reminders.create'), 'Forgot Password?') !!}
					</div>
				<div class="clear"></div>
			</div>
			{!! Form::close() !!}			
		</div>
	</div>
@stop