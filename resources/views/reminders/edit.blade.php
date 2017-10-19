@extends("layouts.index")
@section("content")
	<div class="container">
		<div class="row">
			{!! Form::open(['route'=>['reminders.update', $id, $code], 'class' => 'form-horizontal', 'role' => 'form']) !!}
			<div class="row">
				<div class="input-field">
					{!! Form::label('password', 'Password', array('class' => 'col-lg-3 control-label')) !!}
					{!! Form::password('password', array('class' => 'validate'))!!}
					<div class="input-field ">					
						<div class="text-danger">{!! $errors->first('password') !!}</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="row">
				<div class="input-field">
					{!! Form::label('password_confirmation', 'Password Confirm',array('class' => 'col-lg-3 control-label')) !!}
					{!! Form::password('password_confirmation', array('class' =>'validate')) !!}
				</div>
				<div class="clear"></div>
			</div>			
			<div class="row pull-right">
				<div class="col-lg-3"></div>
					<div class="input-field">
					{!! Form::submit('Submit', array('class' => 'waves-effect waves-light btn')) !!}
					</div>
					<div class="clear"></div>
				</div>
			</div>			
			{!! Form::close() !!}
		</div>
	</div>
@stop
