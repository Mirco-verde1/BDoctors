<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <title>Info Doctor</title>
</head>
<body>

    <h1>{{$user->name}}</h1>
    @foreach ($user->departments as $department)
        <span>{{$department->type}}</span>

    @endforeach
</body>
</html>
