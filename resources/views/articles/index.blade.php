@extends('layouts.index')
@section("content")
	<div class="container">
		<div class="row">
			<div class="col-md-12">
					<div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
						<a href="{{ url('articles/create') }}" class="btn-floating btn-large red">
							<i class="large material-icons">add</i>
						</a>
					</div>
			</div>
		</div>		
	</div>
	@include('articles.list')
@stop