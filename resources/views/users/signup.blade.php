@extends("layouts.index")
@section("content")

<div class="container">
	<div class="row">
		{!! Form::open(['route' => 'signup.store', 'class' => 'col s12', 'role' => 'form']) !!}

		<div class="row">
			<div class="input-field col s6">
				{!! Form::text('first_name', null, array('class' => 'validate')) !!}
				{!! Form::label('first_name','First Name', array('for'=>'first_name','class' =>'validate')) !!}
				<div class="input-field col s12">
					<div class="text-danger">{!! $errors->first('first_name') !!}</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="input-field col s6">
					{!! Form::label('last_name', 'Last Name', array('class' => 'validate')) !!}
					{!! Form::text('last_name', null, array('class' => 'validate', 'for'=>'last_name')) !!}
					<div class="input-field col s12">
						<div class="text-danger">{!! $errors->first('last_name') !!}</div>
					</div>
					<div class="clear"></div>
				</div>		
		</div>
		<div class="row">
			<div class="input-field col s6">
				{!! Form::label('password', 'Password', array('class' => 'validate')) !!}
				{!! Form::password('password', array('class' => 'form-control')) !!}
				<div class="input-field col s12">
					<div class="text-danger">{!! $errors->first('password')!!}</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="input-field col s6">
				{!! Form::label('password_confirmation', 'Password Confirm',array('class' => 'validate')) !!}
				{!! Form::password('password_confirmation', array('class' =>'validate')) !!}
				<div class="input-field col s12"></div>
					<div class="text-danger">{!! $errors->first('password')!!}</div>
				<div class="clear"></div>
			</div>				
		</div>
		<div class="row">
			<div class="input-field col s12">
				{!! Form::label('email', 'Email', array('class' => 'validate')) !!}
				{!! Form::text('email', null, array('class' => 'validate', 'for'=>'email')) !!}
				<div class="input-field col s6">
					<div class="text-danger">{!! $errors->first('email') !!}</div>
				</div>
				<div class="clear"></div>
			</div>		
		</div>
	<div class="row">
		<div class="input-field col s6">
			<div class="col-lg-3"></div>
				<div class="input-field col s12">
					{!! Form::submit('Signup', array('class' => 'btn btn-raised btn-primary')) !!}
				</div>
			<div class="clear"></div>
		</div>		
	</div>		
	{!! Form::close() !!}		
	</div>		
	
</div>
@stop