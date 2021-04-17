<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&display=swap" rel="stylesheet">


        <title>BDoctor</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->

    </head>
    <body>
        <div id="app">
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
            <div class="jumbotron-container-title">
                <span class="title">Cerca il tuo dottore online</span>
                <br>
                <span class="subtitle">BDoctor</span>
                <search-component></search-component>
            </div>
            </div>


        </div>
        {{-- app --}}
        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
