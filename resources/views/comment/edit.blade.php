@extends("layouts.index")
@section('content')
	<div class="container">
		<div class="row">
			<div class="section">
				<div class="card-panel purple darken-3 white-text">Edit Comments</div>
			</div>
			{!! Form::model($comments, ['route'=> ['comment.update', $comment->id], 'method'=>'put', 'class'=>'form-horizontal', 'role'=>'form']) !!}
			@include('comment.form')
			{!! Form::close() !!}						
		</div>
	</div>

@stop