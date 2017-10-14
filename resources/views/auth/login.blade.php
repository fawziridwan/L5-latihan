@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row">
{{--         <div class="col-md-8 col-md-offset-2"> --}}
            <div class="section">
                <div class="card-panel purple darken-3 white-text">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        {{-- <div class="row">
                            <div class="input-field col s12">
                              <input id="password" type="password" class="validate">
                              <label for="password">Password</label>
                            </div>
                        </div> --}}

                        <div class="row{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="input-field col s12">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="input-field col s12">
                                <label for="password" class="col-md-4 control-label">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                        <div class="row">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-flat blue accent-3 waves-effect waves-light white-text">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    {{-- </div> --}}
</div>
@endsection
