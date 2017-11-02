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
	 {{-- <script src="{{url('datatables/js/jquery.min.js')}}"></script>  --}}
	<link rel="stylesheet" href="{{url('datatables/css/datatables.bootstrap.css')}}">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.material.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css">	
	 {{-- <script src="{{url('datatables/js/datatables.bootstrap.js')}}"></script>  --}}
	@section('css')
    @show 
</head>
<body style="background-color: #fff;">
@section('header')
    @include('layouts.header')
@show 

	<div class="container clearfix">

		 		<div class="container">
			 		@include('layouts.message')		
						@yield('search_sort')
		 		</div>
	</div>
	<div id="data-content"> @yield("content")</div>
	<input id="direction" type="hidden" value="asc" />	 	
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="{{asset('js/materialize.min.js')}}"></script>	
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
				$('#example').DataTable({
				    processing: true,
				    serverSide: true,
				    ajax: "{{ route('api.comment') }}",
					columns: [
						{data: 'id',name: 'id'},
						{data: 'article_id',name: 'article_id'},				
						{data: 'content',name: 'content'},
						{data: 'user',name: 'user'},
						{data: 'created_at',name: 'created_at'},
						{data: 'updated_at',name: 'updated_at'},
						{data: 'action', name: 'action', orderable: false, searchable:false}
					]
				});

				function addForm()	{
					save_method = "add";
					$('input[name="_method]').val('POST');
					$('#modal-form').modal('open');
					$('modal-form form')[0].reset();
					$('.modal-title').text("Add Comment");
				}

				function editForm(id)	{
					save_method = "edit";
					$('input[name=_method]').val('PATCH');
					$('#modal-form form')[0].reset();
						$.ajax({
						url:"{{ url('comments') }}" +'/'+id+"/edit",
						type: "GET",
						dataType: "JSON",
						success: function(data)	{
							$('#modal-form').modal('show');
							$('.modal-title').text('Edit Comment');

							$('#id').val(data.id);
							// $('#article_id').val(data.article_id);
							$('#content').val(data.content);
							$('#user').val(data.user);
						},
						error: function()	{
							alert("Data not found");
						}
					});
				}

				$(function()	{
					$('#modal-form form').on('submit', function (e)	{
						if(!e.isDefaultPrevented()){
							var id = $('#id').val();
							if(save_method == 'add') url = "{{ url('comments') }}";
							else "{{ url('comments') . '/' }}" + id;
							
							$.ajax({
								url : url,
								type: "POST",
								data: $('#modal-form').serialize(),
								success: function($data)	{
									$('#modal-form').modal('hide');
									table.ajax.reload();
								}
							});
							return false;
						}
					});
				});


	</script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	@include('sweet::alert');
	<script type="text/javascript">
	(function($){
	  $(function(){

	    $('.button-collapse').sideNav();
		$(document).ready(function(){
		// the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
		$('.modal').modal();
		});
	  }); // end of document ready
	})(jQuery); // end of jQuery name space
	</script>
</body>
</html>