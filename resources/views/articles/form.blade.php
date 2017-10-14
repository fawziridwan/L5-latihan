<div class="section">
	<div class="row">
		<div class="input-field col s12">
		{!! Form::label('title', 'Title', array('class' => 'col-lg-3 control-label')) !!}
		{!! Form::text('title', null, array('autofocus' => 'true', 'for'=>'title','data-error'=>'wrong', 'data-success'=>'right')) !!}
		<div style="color: red" class="data-error"> {!! $errors->first('title') !!} </div>
			<div class="clear"></div>
		</div>
	</div>

	<div class="row">
		<div class="input-field col s12">
		{!! Form::label('content', 'Content', array('class' => 'col-lg-3 control-label')) !!}
		{!! Form::textarea('content', null, array('class'=>'materialize-textarea','autofocus' => 'true')) !!}
		<div style="color: red" class="data-error"> {!! $errors->first('title') !!} </div>
			<div class="clear"></div>
		</div>
	</div>

	<div class="row">
		<div class="input-field col s12">
		{!! Form::label('writer', 'Writer', array('class'=>'col-lg-3 control-label')) !!}
		{!! Form::text('writer', null, array('autofocus'=>'true')) !!}
		<div style="color: red" class="data-error"> {!! $errors->first('writer') !!} </div>
			<div class="clear"></div>
		</div>
	</div> 

	<div class="row" style="margin-left: 2px; margin-right: 2px;">
		<div class="col-lg-3"></div>
			<div class="col-lg-9">
				{!! Form::submit('Save', array('class'=>'btn btn-flat blue accent-3 waves-effect waves-light white-text')) !!}
				{!! link_to(route('articles.index'), 'Back', ['class'=>'btn btn-raised btn-default btn-sm']) !!}
			</div>
			<div class="clear"></div>
	</div>

</div>