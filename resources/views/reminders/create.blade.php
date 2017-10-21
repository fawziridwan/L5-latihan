@extends("layouts.index")
@section("content")
	<div class="container" style="text-align: center">
		<div class="row">
			{!! Form::open(['route' => 'reminders.store', 'class' => 'col s12 form-horizontal', 'role' => 'form']) !!}
			
			<div class="row">
				<div class="input-field col s12">
					{!! Form::label('email', 'Email', array('class' => 'validate')) !!}
					{!! Form::text('email', null, array('class' => 'validate'))!!}
					<div class="col-lg-4">
						<div class="text-danger">{!! $errors->first('email') !!}</div>
					</div>
					<div class="clear"></div>				
				</div>
			</div>
			<div class="row">
				<div class="row pull-right">
					<div class="col l3"></div>
						<div class="input-field col s12">
							{!! Form::submit('Submit', array('class' => 'btn btn-raised blue')) !!}
						</div>
					<div class="clear"></div>
				</div>				
			</div>
			{!! Form::close() !!}			
		</div>	
	</div>
@stop