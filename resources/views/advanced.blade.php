<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&display=swap" rel="stylesheet">
        <!-- Styles -->
         <link rel="stylesheet" href="{{asset('css/app.css')}}">
         <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <title>Advanced search</title>
    </head>
    <body>

        <div id="app">
            @include('layouts/guest/partials/navbar')
            <div class="container-nav d-flex justify-content-center">
                <advance-component></advance-component>

            </div>


        </div>

        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
