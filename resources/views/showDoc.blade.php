    @extends('layouts.app')


    @section('content')

        <div id="app">

            <img src="{{$user->detail->pic}}" alt="">

            <h1>Dottor/ssa: {{$user->name}} {{$user->lastname}}</h1>

            @foreach ($user->departments as $department)
            <h2>Specializzazione: {{$department->type}}</h2>
            @endforeach

        <div class="contacts">
            <h1>Contatti: </h1>
            <h2>Indirizzo: {{$user->address}}</h2>

            <h2>Email: {{$user->email}}</h2>

            <h2>{{$user->detail->phone}}</h2>
        </div>

        <div class="curriculum">
         <h1>Curriculum: </h1>
           <h3>{{$user->detail->curriculum}}</h3>
        </div>

        </div>
    @endsection
