@extends("layouts.index")
@section('content')
	<div class="container">
		<div class="row">
			<div class="section">
				<div class="card-panel purple darken-3 white-text">Edit Articles</div>
			</div>
			{!! Form::model($articles, ['route'=> ['articles.update', $articles->id], 'method'=>'put', 'class'=>'form-horizontal', 'role'=>'form','enctype'=>'multipart/form-data','file'=>'true']) !!}
			@include('articles.form')
			{!! Form::close() !!}						
		</div>
	</div>

@stop