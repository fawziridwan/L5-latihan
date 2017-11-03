@extends('layouts.index')
@section('content')
	<div class="container">
	        <div class="row">
	            <div class="col s12 m12">
	                <table id="example" class="responsive-table" cellspacing="0" width="100%">
	                    <thead>
	                        <tr>
	                        <div style="text-align: right;">
	                        </div>
	                            <th>Id</th>
	                            <th>Title</th>
	                            <th>Content</th>
	                            <th>Writer</th>
	                            <th>Created At</th>
	                            <th>Updated At</th>
	                            <th><center>Action</center></th>
	                        </tr>
	                    </thead>
	                </table>            
	            </div>
	        </div>
	</div>
@endsection

<script type="text/javascript">
	var table = $('#example').DataTable({
			    processing: true,
			    serverSide: true,
			    ajax: "{{ route('datatable.apiArticle') }}",
				columns: [
					{data: 'id',name: 'id'},
					{data: 'title',name: 'title'},
					{data: 'content',name: 'content'},
					{data: 'writer',name: 'writer'},					
					{data: 'created_at',name: 'created_at'},
					{data: 'updated_at',name: 'updated_at'},
					{data: 'action', name: 'action', orderable: false, searchable:false}
				]
			});

			function deleteData(id)	{
				var popup = confirm("Are you sure for delete this articles ?");
				var csrf_token = $('meta[name="csrf-token"]').attr('content');
				if (popup == true) {
					$.ajax({
						url: "{{ url('articles') }}" + '/' + id,
						type: "POST",
						data: {'_method': 'DELETE','_token':csrf_token},
						success: function(data)	{
							table.ajax.reload();
							console.log(data);
						},
						error: function()	{
							alert("Oops! Something Wrong!");
						}
					})
				}
			}


	</script>