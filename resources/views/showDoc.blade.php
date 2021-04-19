    @extends('layouts.app')


    @section('content')
        <div id="app">

            <div class="info-doctor">

            <h1>{{$user->name}} {{$user->lastname}}</h1>



            @foreach ($user->departments as $department)
                <h2>{{$department->type}}</h2>
            @endforeach

            <h2>{{$user->email}}</h2>

            <h2>{{$user->address}}</h2>


            @foreach ($user->detail() as $details)
            <h2>{{$details->pic}}</h2>

        @endforeach
    </div>
        </div>
    @endsection
