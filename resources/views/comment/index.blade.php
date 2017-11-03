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
                            <th>Articles Id</th>
                            <th>Content</th>
                            <th>User</th>
                            <th>Created At</th>
                            <th>Last Update At</th>
                            <th><center>Action</center></th>
                        </tr>
                    </thead>
                </table>            
            </div>
        </div>
        @include('comment.form')
</div>
@endsection