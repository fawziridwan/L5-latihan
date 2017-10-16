<nav class="light-blue lighten-1" role="navigation">
  <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Laravel - App</a>
    <ul class="right hide-on-med-and-down">
        @if (Route::has('login'))
            @if (Auth::check())
                <li><a  href="{{ url('/home') }}">Home</a></li>
                {{-- <li><a href="{{ url('/admin/posts')}}">Post</a></li> --}}
                <li><a href="{{ url('/articles')}}">Articles</a></li>
            @else
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
            @endif
        @endif
    </ul>

    <ul id="nav-mobile" class="side-nav">
      <li><a href="{{ url('/')}}">Home</a></li>
      {{-- <li><a href="{{ url('/admin/posts')}}">Post</a></li>       --}}
      <li><a href="{{ url('/articles')}}">Articles</a></li>
    </ul>
    <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
  </div>
</nav