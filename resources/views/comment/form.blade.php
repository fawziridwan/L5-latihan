<div class="section">

  <div class="row">
    <div class="input-field col s12">
    {!! Form::label('content', 'Content', array('class' => 'col-lg-3 control-label')) !!}
    {!! Form::textarea('content', null, array('class'=>'materialize-textarea','autofocus' => 'true')) !!}
    <div style="color: red" class="data-error"> {!! $errors->first('content') !!} </div>
      <div class="clear"></div>
    </div>
  </div>

  <div class="row">
    <div class="input-field col s12">
    {!! Form::label('user', 'user', array('class'=>'col-lg-3 control-label')) !!}
    {!! Form::text('user', null, array('autofocus'=>'true')) !!}
    <div style="color: red" class="data-error"> {!! $errors->first('user') !!} </div>
      <div class="clear"></div>
    </div>
  </div>

  <div class="row" style="margin-left: 2px; margin-right: 2px;">
    <div class="col-lg-3"></div>
      <div class="col-lg-9">
        {!! Form::submit('Save', array('class'=>'btn btn-flat blue accent-3 waves-effect waves-light white-text')) !!}
        {!! link_to(route('comment.index'), 'Back', ['class'=>'btn btn-raised btn-default btn-sm']) !!}
      </div>
      <div class="clear"></div>
  </div>

</div>