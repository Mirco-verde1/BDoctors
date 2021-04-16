<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&display=swap" rel="stylesheet">


        <title>BDoctor</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->

    </head>
    <body>
        @include('layouts/guest/partials/navbar')
        <div class="container-nav d-flex justify-content-center">
          <div class="logo-img">
             <img src="" alt="">
          </div>
          <div>
              <nav class="header-nav">
                  <ul>
                      <li>home</li>
                      <li>payment</li>
                  </ul>
              </nav>
          </div>
        </div>
        <div class="jumbotron">
          <div class="container-title-jumbotron">
             <h1>Cerca il tuo dottore online</h1>
             <h2>BDoctor</h2>
          </div>
        </div>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif



            <div id="app">

                <search-component></search-component>



               </div>

        </div>

        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
