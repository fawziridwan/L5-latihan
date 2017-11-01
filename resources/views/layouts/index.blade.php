<!DOCTYPE html>
<html>
<head>
	<title>Laravel | Articles CRUD</title>
	<link rel="stylesheet" href="{{asset('css/materialize.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
	<meta name="_token" content="{{ csrf_token() }}"/>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="{{url('datatables/css/datatables.bootstrap.css')}}">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.material.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css">	
	 {{-- <script src="{{url('datatables/js/jquery.min.js')}}"></script>  --}}
	 <script src="{{url('datatables/js/datatables.bootstrap.js')}}"></script> 
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
					@yield('search_sort')
	 		</div>
	 	{{-- </div> --}}
	 {{-- </div> --}}
</div>
<div id="data-content"> @yield("content")</div>
<input id="direction" type="hidden" value="asc" />	 	
{{-- @yield("content") --}}
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="{{url('datatables/js/jquery.dataTables.min.js')}}"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.material.min.js"></script>
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
    <script>
    	$.ajaxSetup({
    		headers: {
    			'X-CSRF-TOKEN' :$('meta[name = "_token"]').attr('content')
    		}  
    	});
	    $('#comment').on('click', function(){
	        $.ajax({
	            url : '/postcomment',
	            type : 'POST',
	            datatype : 'json',
	            data : {
	            	'article_id' : $('#article_id').val(),
	                'content' : $('#content').val(),
	                'user' : $('#user').val()
	            },
	            success : function(data)    {
	            	alert('success');              
	            },
	            error : function(xhr, status, error) {
	            	var err = eval("("+xhr.responseText+")");
	            	alert(err.message);
	                console.log(xhr.error + " ERROR STATUS : " + status);
	            },
	            complete : function() {
	                alreadyloading = false;
	            }                
	        });
	    });	    	
    </script>
		<script type="text/javascript">
		$(document).ready(function() {
			oTable = $('#example').DataTable({
				"processing": true,
				"serverSide": true,
				"ajax": "{{ route('comment.getComments') }}",
				"columns": [
					{data: 'id', name: 'id'},
					{data: 'article_id', name: 'article_id'},
					{data: 'content', name: 'content'},
					{data: 'user', name: 'user'},
					{data: 'created_at', name: 'created_at'},
					{data: 'updated_at', name: 'updated_at'},
					{data: 'action',name: 'action', orderable:false, searchable:false}
				],
				pageLength : 5,
			});

			/*
			function addForm()
			{
				save_method = "add";
				$('input[name=_method]').val('POST');
				$('#modal-form').model('show');
				$('#model-form form')[0].reset();
				$('#modal-title').text('Add Comment');
			}

			function deleteData(id)	{
				var popup = confirm("Anda yakin ingin menghapus komentar ini ?");
				var csrf_token = $('meta[name="csrf_token"]').attr('content');
				if (popup==true) {
					$.ajax({

					})
				}
			}

			$(function()	{
				$('#modal-form form').validator().on('submit', function (e)	{
					if (!e.isDefaultPrevented())
				})
			});
			*/

			// function editForm(id)	{
			// 	save_method = "edit";
			// 	$('input[name=_method]').val('PATCH');
			// 		$.ajax({
					// url : "" + '/' + id + "/edit",
			// 		type: "GET",
			// 		dataType: "JSON",
			// 		success: function(data)	{
			// 			$('$modal-form').modal('show');
			// 			$(#'modal-title').text('Edit Comment');

			// 			$('#id').val(data.id);
			// 			$('#article_id').val(data.article_id);
			// 			$('#content').val(data.content);
			// 			$('#user').val(data.user);
			// 		},
			// 		error: function()	{
			// 			alert("Data not found");
			// 		}
			// 	});
			// }


		});
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