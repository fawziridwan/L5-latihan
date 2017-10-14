{{-- <nav class="purple accent-3" role="navigation">
  <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Gilacoding</a>
    <ul class="right hide-on-med-and-down">
      <li><a href="{{ url('/')}}">Home</a></li>
    </ul>

    <ul id="nav-mobile" class="side-nav">
      <li><a href="{{ url('/')}}">Home</a></li>
    </ul>
    <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
  </div>
</nav>
 --}}
<nav class="light-blue lighten-1" role="navigation">
<div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Logo</a>
  <ul class="right hide-on-med-and-down">
    <li><a href="{{ url('/') }}">Home</a></li>
    <li><a href="{{ url('/statics/profile') }}">About</a></li>
    <li><a href="{{ url('/articles') }}">Article</a></li>
  </ul>

  <ul id="nav-mobile" class="side-nav">
    <li><a href="{{ url('/') }}">Home</a></li>
    <li><a href="{{ url('/statics/profile') }}">About</a></li>
    <li><a href="{{ url('/articles') }}">Article</a></li>
  </ul>
  <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
</div>
</nav>