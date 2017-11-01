@extends('layouts.index')
@section('content')
<div class="container">
    <table class="table" id="table-articles">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Content</th>
                <th>Writer</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>
@endsection
<script type="text/javascript">
    $(function() {
        var oTable = $('#table-articles').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ url("data-articles") }}'
            },
            columns: [
            {data: 'id', name: 'id'},
            {data: 'title', name: 'title'},
            {data: 'content', name: 'content'},
            {data: 'writer', name: 'writer', orderable: false},
            //{data: 'kategori', name: 'kategori', orderable: false, searchable: false},
        ],
        });
    });
</script>