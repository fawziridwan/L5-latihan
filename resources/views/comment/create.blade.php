@extends("layouts.index")
@section("content")
	<div class="container">
		<div class="row">
			<div class="section">
				<div class="card-panel purple darken-3 white-text">Create Comment</div>
			</div>
			<div class="col-md-12">
				{{-- {!! Form::open(['route'=>'comments.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}
				{!! csrf_field() !!} --}}
				@include('comment.form')
				{{-- {!! Form::close() !!} --}}				
			</div>			
		</div>
	</div>
@endsection