<!DOCTYPE html>
<html>
<head>
	<title>Laravel | Articles CRUD</title>
	<link rel="stylesheet" href="{{asset('css/materialize.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	@section('css')
    @show 
</head>
<body style="background-color: #fff;">
@section('header')
    @include('layouts.header')
@show

<div class="container clearfix">
	 {{-- <div class="row row-offcanvas row-offcanvas-left"> --}}
	 	{{-- <div id="main-content" class="col-xs-9 col-sm-9 main"> --}}
	 		<div class="container">
		 		@include('layouts.message')	 			
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
				<div id="data-content"> @yield("content")</div>
					<input id="direction" type="hidden" value="asc" />	 	
	 		</div>
	 	{{-- </div> --}}
	 {{-- </div> --}}
</div>
{{-- @yield("content") --}}
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script>
        $('#search').on('click', function(){
            $.ajax({
                url : '/articles',
                type : 'GET',
                datatype : 'json',
                data : {
                    'keywords' : $('#keywords').val(),
                    'direction' : $('#direction').val()
                },
                success : function(data)    {
                    $('#data-content').html(data['view']);
                    $('#keywords').val(data['keywords']);
                    $('#direction').val(data['direction']);                    
                },
                error : function(xhr, status) {
                    console.log(xhr.error + " ERROR STATUS : " + status);
                },
                complete : function() {
                    alreadyloading = false;
                }                
            });
        });
    </script>
    <script>
	    $(document).ready(function() {
	    $(document).on('click', '#id', function(e) {
	    sort_articles();
	    e.preventDefault();
	    });
	    });
	    function sort_articles() {
	    $('#id').on('click', function() {
	    $.ajax({
	    url : '/articles',
	    typs : 'GET',
	    dataType : 'json',
	    data : {
	    'keywords' : $('#keywords').val(),
	    'direction' : $('#direction').val()
	    },
	    success : function(data) {
	    $('#data-content').html(data['view']);
	    $('#keywords').val(data['keywords']);
	    $('#direction').val(data['direction']);

	    if(data['direction'] == 'asc') {
	    $('i#ic-direction').attr({class: "fa fa-arrow-up"});
	    } else {
	    $('i#ic-direction').attr({class: "fa fa-arrow-down"});
	    }
	    },
	    error : function(xhr, status, error) {
	    console.log(xhr.error + "\n ERROR STATUS : " + status +
	    "\n" + error);
	        },
	    complete : function() {
	    alreadyloading = false;
	    }
	    });
	    });
	    }
	    </script>
<script src="{{asset('js/materialize.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
@include('sweet::alert');
<script type="text/javascript">
(function($){
  $(function(){

    $('.button-collapse').sideNav();

  }); // end of document ready
})(jQuery); // end of jQuery name space
</script>
</body>
</html>