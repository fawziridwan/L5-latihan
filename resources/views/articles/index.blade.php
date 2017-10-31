@extends('layouts.index')
@section('search_sort')
<div class="row">
	<div class="form-group label-floating">

	<label class="col-lg-2" for="keywords">Search Article</label>

	<div class="col-lg-8">
		<input type="text" class="form-control" id="keywords" placeholder="Type search keywords">
	</div>

	<div class="col-lg-2">
		<button id="search" class="btn btn-flat blue btn-flat" type="button"> Search</button>
	</div>
		<div class="clear"></div>
	</div>
</div>
<br />

<p>Sort articles by : <a id="id">ID &nbsp;<i id="ic-direction"></i></a></p>

<br />
@endsection
@section("content")
	<div class="container">
		<div class="row">
			<div class="col-md-12">
					<div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
						<a href="{{ url('articles/create') }}" class="btn-floating btn-large red" title="Create Articles">
							<i class="large material-icons">add</i>
						</a>
					</div>
			</div>
		</div>		
	</div>
	<div id="articles-list">
		@include('articles.list');
	</div>
@endsection