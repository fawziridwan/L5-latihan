@extends("layouts.index")
@section("content")
		<div class="container" style="background-color: white; padding: 20px; border-radius: 10px; color: black;">
			<div class="col s9" style="margin:10px;">	
				<div class="row">
					<blockquote style="border-left: 5px solid #29b6f6;">
						<p class="flow-text"><strong>{!! $articles->title !!}</strong></p>
					</blockquote>
					<br>
					<p style="text-align: justify; background: #fff; ">{!! $articles->content !!}</p>
				</div>					
			</div>
		</div>

		<div class="container" style="padding: 20px;">
			@if (!empty($photos))
			<div class="row">
		 			@foreach($photos as $photo)
						<div class="col s4">
						  <div class="card">
						    <div class="card-image">
								<img id="imgPhoto" onclick="boxed()" class="img-responsive materialboxed" src="{{ asset($photo->image) }}" alt="">
						      <span class="card-title"></span>
						    </div>
						    <div class="card-content">
						      <p>{{ $photo->created_at }}</p>
						    </div>
						    <div class="card-action" style="padding-bottom: 30px;">				    	
								{!! Form::open(array('route' => array('deleteImage', $photo->id), 'method' => 'delete')) !!}
								{!! link_to_route('showImage', "Edit",$photo->id, ['class' => 'btn btn-sm btn-raised btn-info pull-left']) !!}
								{!! Form::submit('delete', ['class' =>'btn btn-sm black btn-raised btn-danger pull-right', 'style' => 'margin-right: 10px;', 'onclick' => "return confirm('Are you sure want to delete this image?')"]) !!}
								{!! Form::close() !!}
						    </div>
						  </div>
						</div>	
					@endforeach		
			</div>			
			@endif
		</div>

{{-- 		<div class="row">
			{!! Form::open(array('route'=>array('articles.destroy', $articles->id), 'method'=>'delete')) !!}
			{!! link_to(route('articles.index'), "Back", ['class' => 'btn btn-flat blue accent-3 waves-effect waves-light white-text']) !!}
			{!! link_to(route('articles.edit', $articles->id), "Edit", ['class' => 'btn btn-flat green accent-3 waves-effect waves-light white-text']) !!}
			{!! Form::submit('Delete', array('class'=>'btn btn-flat black accent-3 white-text', "onclick"=>"return confirm('are you sure want delete data?')")) !!}
			{!! Form::close() !!}			
		</div> --}}
{{-- 		<div class="container">
			<div class="col s12" style="padding: 20px; border-radius: 20px; background-color: #fff;">
				<blockquote style="border-left: 5px solid red;"><p class="flow-text">Image</p></blockquote>
				<br>
					<img id="imgPhoto" onclick="boxed()" class="img-responsive materialboxed" src="{{ asset('storage') }}/image/{{ $photo->image }}" alt=""><br>						
			</div>
		</div>
 --}}							
		<br>
		<div class="container">
			<div class="row">
				<div class="col s12">
				  <ul class="tabs">
				    <li class="tab col s3"><a href="#test1">Leave Comments</a></li>
				    <li class="tab col s3"><a href="#test2">Comments</a></li>
					</ul>
				</div>
				<div id="test1" class="col s12">
					{!! Form::open(['route' => 'comments.store', 'class' => 'form-horizontal', 'role' => 'form']) !!}
					<div class="row">
						<div class="form-group">
							{!! Form::hidden('article_id', $value = $articles->id, array('readonly')) !!}
						</div>
						<div class="clear"></div>
					</div>

					<div class="row">
						<div class="input-field col l12">
							{!! Form::label('content', 'Content', array('class' => 'col-lg-3 control-label')) !!}
							{!! Form::textarea('content', null, array('class'=>'materialize-textarea','autofocus' => 'true')) !!}
							{!! $errors->first('content') !!}
						</div>
						<div class="clear"></div>
					</div>

					<div class="row">
						<div class="input-field col l12">
							{!! Form::label('user', 'User', array('class' => 'col-lg-3 control-label')) !!}
							{!! Form::text('user', null)!!}
							{!! $errors->first('user') !!}				
						</div>
						<div class="clear"></div>
					</div>
					<div class="row">
						<div class="col-lg-3"></div>
							<div class="input-field col l12">
							{!! Form::submit('Save', array('class' => 'btn btn-flat blue white-text pull-right'))!!}
								</div>
								<div class="clear"></div>
					</div>
					{!! Form::close() !!}											
				</div>
				<div id="test2" class="col s12">
{{-- 					<div class="container">
						<div class="col s12" style="padding: 20px; border-radius: 20px; background-color: #fff;"> --}}
							{{-- <blockquote style="border-left: 5px solid red;"><p class="flow-text">Comments</p></blockquote> --}}
							@foreach($comments as $comment)
							<div class="col s12">
								<p class="pull-right"> Create by <b><i>{!! $comment->user !!}</i></b> <br> Publish On <b><i>{!! $comment->created_at->format('D d M Y') !!}</i></b></p>
									<p style="text-align: justify;">{!! $comment->content !!}</p>					
							</div>
							@endforeach		
{{-- 						</div>								
					</div> --}}		
				</div>
			</div>			
		</div>
@stop 
<script type="text/javascript">
	function boxed()	{
		$(document).ready(function(){
			$('.materialboxed').materialbox();
		});			
	}
</script>

<style type="text/css" media="screen">
	#imgPhoto 	{
		width: 356px;
		height: 280px;
		overflow: auto navy;
	}
</style>