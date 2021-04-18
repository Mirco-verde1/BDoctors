@extends('layouts.app')


@section('content')
    <div id="app">

        <h1>{{$user->name}}</h1>

        @foreach ($user->departments as $department)
            <span>{{$department->type}}</span>
        @endforeach

    </div>
@endsection
