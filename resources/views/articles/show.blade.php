@extends("layouts.index")
@section("content")
	<div class="container">
		<div class="row">
			<articles class="row">
				<h2> {!! $articles->title !!} </h2>
				<div><p style="text-align: justify;">{!! $articles->content !!}</p></div>
				<div><p>{!! $articles->writer !!}</p></div>
			</articles>	

			{!! Form::open(array('route'=>array('articles.destroy', $articles->id), 'method'=>'delete')) !!}
			{!! link_to(route('articles.index'), "Back", ['class' => 'btn btn-flat blue accent-3 waves-effect waves-light white-text']) !!}
			{!! link_to(route('articles.edit', $articles->id), "Edit", ['class' => 'btn btn-flat green accent-3 waves-effect waves-light white-text']) !!}
			{!! Form::submit('Delete', array('class'=>'btn btn-flat black accent-3 waves-effect waves-light white-text', "onclick"=>"return confirm('are you sure want delete data?')")) !!}
			{!! Form::close() !!}			
		</div>
	</div>
@stop 

