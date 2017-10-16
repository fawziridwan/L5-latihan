@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row">
        {{-- <div class="col-md-8 col-md-offset-2"> --}}
            <div class="section">
                <div class="card-panel purple darken-3 white-text">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="row{{ $errors->has('name') ? ' has-error' : '' }}">

                            <div class="input-field col s12">
                                <label for="name" class="col-md-4 control-label" placeholder="Nama"></label>
                                <input id="name" type="text" class="form-control" name="name" placeholder="Nama" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="input-field col s12">
                               <label for="email" class="col-md-4 control-label" placeholder="E-Mail Address"></label>
                                <input id="email" type="email" class="form-control" name="email" placeholder="E-Mail Address" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="input-field col s12">
                                <label for="password" class="col-md-4 control-label" placeholder"Password"></label>
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">

                            <div class="input-field col s12">
                                <label for="password-confirm" class="col-md-4 control-label" placeholder="Confirm Password"></label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        {{-- </div> --}}
    </div>
</div>
@endsection
