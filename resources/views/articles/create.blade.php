@extends("layouts.index")
@section("content")
	<div class="container">
		<div class="row">
			<div class="section">
				<div class="card-panel purple darken-3 white-text">Create Articles</div>
			</div>
			<div class="col-md-12">
				{!! Form::open(['route'=>'articles.store', 'class'=>'form-horizontal', 'role'=>'form','enctype'=>'multipart/form-data','file'=>'true']) !!}
				{!! csrf_field() !!}
				@include('articles.form')
				{!! Form::close() !!}				
			</div>			
		</div>
	</div>
@endsection