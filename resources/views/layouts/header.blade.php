<nav class="light-blue lighten-1" role="navigation">
  <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Laravel - App</a>
    <ul class="right hide-on-med-and-down">
        @if (Sentinel::check())
          <li>{!! link_to(route('logout'), 'Logout') !!}</li>
          <li><a>Welcome {!! Sentinel::getUser()->first_name !!}</a></li>
          <li><a href="{{ url('/articles')}}">Articles</a></li>
        @else
          <li><a  href="{{ url('/home') }}">Home</a></li>
          <li>{!! link_to(route('signup'), 'Signup') !!}</li>
          <li>{!! link_to(route('login'), 'Login') !!}</li>
        @endif        
    </ul>

    <ul id="nav-mobile" class="side-nav">
      <li><a href="{{ url('/')}}">Home</a></li>
      <li>{!! link_to(route('signup'), 'Signup') !!}</li>      
      <li><a href="{{ url('/articles')}}">Articles</a></li>
    </ul>
    <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
  </div>
</nav