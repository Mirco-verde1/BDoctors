<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a href="#"><img src="img/logomod.png" class="logo-img"alt=""></a>
            @if (Route::has('login'))
            @auth
            <a class="query-submit btn btn-outline-success my-2 my-sm-0" phref="{{ url('/home') }}">Home</a>
            @else
                <a class="query-submit btn btn-outline-success my-2 my-sm-0" href="{{ route('login') }}">Login</a>
            @endif
            @if (Route::has('register'))
            <a class="query-submit btn btn-outline-success my-2 my-sm-0 btn-register" href="{{ route('register') }}">Register</a>
            @else
            <a class="query-submit btn btn-outline-success my-2 my-sm-0 btn-register" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        @endauth
        @endif
    </div>
</nav>


