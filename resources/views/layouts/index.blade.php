<!DOCTYPE html>
<html>
<head>
	<title>Laravel | Articles CRUD</title>
	<link rel="stylesheet" href="{{asset('css/materialize.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	@section('css')

    @show
</head>
<body style="background-color: #e0e0e0;">
@section('header')
    @include('layouts.header')
@show

<div class="container clearfix">
	 {{-- <div class="row row-offcanvas row-offcanvas-left"> --}}
	 	{{-- <div id="main-content" class="col-xs-9 col-sm-9 main"> --}}
	 		<div class="container">
		 		<div class="row">
					<section>
				        @if (Session::has('error'))
				        <div class="card-panel black darken-3 white-text">
				            {{Session::get('error')}}
				        </div>
				        @endif
				        @if (Session::has('notice'))
				            <div class="card-panel green darken-3 white-text">
				        {{Session::get('notice')}}
				        </div>
				        @endif
				        @if (count($errors) > 0)
					        <div class="card-panel orange white-text">
					            @foreach ($errors->all() as $error)
					                <div class="darken-3 white-text">{{ $error }}</div>
					            @endforeach
					        </div>
					    @endif					
					</section>	 			
		 		</div>	 			
	 		</div>
	 	{{-- </div> --}}
	 {{-- </div> --}}
	@yield('content')
</div>

<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="{{asset('js/materialize.min.js')}}"></script>
<script type="text/javascript">
(function($){
  $(function(){

    $('.button-collapse').sideNav();

  }); // end of document ready
})(jQuery); // end of jQuery name space
</script>
</body>
</html>