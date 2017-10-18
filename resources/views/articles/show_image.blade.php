@extends('layouts.index')
@section('content')
<div class="container">
	<div class="col s4">
		<div class="panel panel-success text-center">
			<div class="panel-heading"><h4><strong>Edit Gambar</strong></h4></div>
		</div>
		{!! Form::open(['route' => ['updateImage', $img->id], 'method' => 'put', 'class' => 'form-horizontal', 'role' =>'form', 'enctype' => 'multipart/form-data']) !!}
			<div class="card-panel">
				<div class="col offset-s2 col s10" style="padding: 15px;">
					<img src="{{ asset($img->image) }}" alt="" style="width: 300px;">
				</div>
				<div class="row">
					<div class="file-field input-field" style="padding-left: 25px;">
					  <div class="btn">
					    <span>File</span>
						{{ Form::file('image', ['class'=>'image','multiple'=>""]) }} 
					  </div>
					  <div class="file-path-wrapper">
						{{ Form::text('imageText', null, ['class'=>'file-path validate ', 'placeholder'=>"Browse"]) }}
					  </div>
					</div>
				</div>
				<div class="panel-footer clearfix" style="padding-left: 15px;">
					{!! Form::submit('Change', ['class'=>'btn btn-flat green white-text']) !!}
					{{ link_to(url()->previous(), 'Back',['class'=>	'btn btn-flat blue btn-info pull-left white-text']) }}
				</div>
			</div>
		{!! Form::close() !!}
	</div>	
</div>
@endsection