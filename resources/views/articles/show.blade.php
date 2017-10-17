@extends("layouts.index")
@section("content")
		<div class="container" style="background-color: white; padding: 20px; border-radius: 10px; color: black;">
				<div class="col s9" style="margin:10px;">	
					<div class="row">
						<blockquote style="border-right: 5px solid red;">
							<p class="pull-right"><b><i>{!! $articles->writer !!}</i></b></p>
						</blockquote>
						<blockquote style="border-left: 5px solid #29b6f6;">
							<p class="flow-text"><strong>{!! $articles->title !!}</strong></p>
						</blockquote>
						<br>
						<p style="text-align: justify;">{!! $articles->content !!}</p>
					</div>					
				</div>
				{!! Form::open(array('route'=>array('articles.destroy', $articles->id), 'method'=>'delete')) !!}
				{!! link_to(route('articles.index'), "Back", ['class' => 'btn btn-flat blue accent-3 waves-effect waves-light white-text']) !!}
				{!! link_to(route('articles.edit', $articles->id), "Edit", ['class' => 'btn btn-flat green accent-3 waves-effect waves-light white-text']) !!}
				{!! Form::submit('Delete', array('class'=>'btn btn-flat black accent-3 white-text', "onclick"=>"return confirm('are you sure want delete data?')")) !!}
				{!! Form::close() !!}			
			<br>
		</div>
		<br>
		<div class="container" style="background-color: white; padding: 20px; border-radius: 10px; color: black;">
			<blockquote style="border-left: 5px solid green;">
				<p class="flow-text">Give Comments</p>
			</blockquote>
			{!! Form::open(['route' => 'comments.store', 'class' => 'form-horizontal', 'role' => 'form']) !!}
			<div class="row">
				<div class="input-field col s12">
					{!! Form::hidden('article_id', $value = $articles->id, array('readonly')) !!}
				</div>
				<div class="clear"></div>
			</div>

			<div class="row">
				<div class="input-field col s12">
					{!! Form::label('content', 'Content', array('class' => 'col-lg-3 control-label')) !!}
					{!! Form::textarea('content', null, array('class'=>'materialize-textarea','autofocus' => 'true')) !!}
					{!! $errors->first('content') !!}
				</div>
				<div class="clear"></div>
			</div>

			<div class="row">
				<div class="input-field col s12">
					{!! Form::label('user', 'User', array('class' => 'col-lg-3 control-label')) !!}
					{!! Form::text('user', null)!!}
					{!! $errors->first('user') !!}				
				</div>
				<div class="clear"></div>
			</div>
			<div class="row">
				<div class="col-lg-3"></div>
					<div class="input-field col s12">
					{!! Form::submit('Save', array('class' => 'btn btn-flat blue white-text pull-right'))!!}
						</div>
						<div class="clear"></div>
			</div>
			{!! Form::close() !!}						
		</div>		
		<br>
		<div class="container">
			<div class="col s12" style="padding: 20px; border-radius: 20px; background-color: #fff;">
				<blockquote style="border-left: 5px solid red;"><p class="flow-text">Comments</p></blockquote>
				@foreach($comments as $comment)
				<div class="col-md-3">
					<p class="pull-right"> Create by <b><i>{!! $comment->user !!}</i></b> <br> Publish On <b><i>{!! $comment->created_at->format('D d M Y') !!}</i></b></p>
				</div>
				<br><br><br>
				<hr>
				<div class="col s9">
						<p style="text-align: justify;">{!! $comment->content !!}</p>					
				</div>
				@endforeach		
			</div>
		</div>		
		<br>
		<div class="container">
			<div class="col s12" style="padding: 20px; border-radius: 20px; background-color: #fff;">
				<blockquote style="border-left: 5px solid red;"><p class="flow-text">Image</p></blockquote>
				<br>
				@foreach($photos as $photo)
					<img id="imgPhoto" onclick="boxed()" class="img-responsive materialboxed" src="{{ asset('storage') }}/image/{{ $photo->image }}" alt=""><br>						
				@endforeach		
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