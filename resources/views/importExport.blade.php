@extends('layouts.index')
@section("content")
<div class="container">
    <a href="{{ URL::to('downloadExcel/xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
    <a href="{{ URL::to('downloadExcel/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>
    <a href="{{ URL::to('downloadExcel/csv') }}"><button class="btn btn-success">Download CSV</button></a>
    
    
    {{--  {!! Form::open(array('url' => 'importExcel','method'=>'POST','enctype'=>'multipart/form-data','files'=>'true','class' => 'form-horizontal')) !!}  --}}
    <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
        <input type="file" name="import_file" />
        {{ csrf_field() }}
        <button class="btn btn-primary">Import File</button>
    {{--  {!! Form::close() !!}      --}}
    </form>  
</div>
@endsection