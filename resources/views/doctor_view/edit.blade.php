@extends('layouts.app')

<title>{{ __('BDoctors - Modifica Profilo') }}</title>

@section('content')

    @php
        $slicedURI = $_SERVER['REQUEST_URI'];

        // Estrapoliamo dall'URI la posizione del valore numerico associato all'id
        preg_match('/[0-9]/', $slicedURI, $matches, PREG_OFFSET_CAPTURE);
        $idPosition = $matches[0][1];
        $idInURL = intval(substr($slicedURI, $idPosition, (strlen($slicedURI) - $idPosition)));
    @endphp

    {{-- Verifichiamo che l'id dell'utente che sta modificando il suo profilo si trovi
    alla posizione estrapolata in precedenza --}}
    @if($idInURL === $user->id)

        <div class="container">

            <form method="post" action="{{ route('doc.update', $user->id) }}" enctype="multipart/form-data">

                @METHOD('PATCH')
                @csrf

                        <nav id="secondary-nav">
                            <div>
                                <ul>
                                    <li class="active-nav">
                                        <b>My account</b>
                                    </li>
                                </ul>
                            </div>
                        </nav>


                        <div class="box-general">
                            <div class="profile">



                                    <div class="form-group d_flex_column">
                                        <div class="row container-box1">
                                            {{-- pic --}}
                                            <div class="col-md-6 offset-col-md-2">
                                            <figure class=" doctor-pic-show-container">
                                                <img class="doctor-pic-show" src="{{ URL::asset('storage/'.$user->detail->pic)}}" alt="{{$user->name}} {{$user->lastname}}">
                                            </figure>
                                        </div>
                                            {{-- name --}}
                                        <div class="col-md-4 align-self-center">
                                            <label class="" for="name"><b>Name</b></label>
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Insert your name" value="{{$user->name}}" required>
                                            <br>


                                            <label class="" for="lastname"><b>Lastname</b></label>
                                            <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Insert your lastname" value="{{$user->lastname}}" required>
                                            <br>
                                        </div>
                                        </div>


                                        <label class="" for="email"><b>Email</b></label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Insert your email" value="{{$user->email}}" required>
                                        <br>

                                        {{-- <label class="" for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Change your password">
                                        <br> --}}

                                        <label class="" for="address"><b>Address</b></label>
                                        <input type="text" name="address" id="address" class="form-control" placeholder="Insert your address" value="{{$user->address}}" required>
                                        <br>

                                        <label for="departments"><b>Departments</b></label>
                                        <select class="form-control" name="departments[]" id="departments" multiple>
                                            @foreach($departments as $department)
                                                <option value="{{$department->id}}"> {{$department->type}} </option>
                                            @endforeach
                                        </select>

                                        <label class="" for="phone"><b>Phone</b></label>
                                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Insert your phone" value="{{$userDetail->phone}}">
                                        <br>

                                        <label for="curriculum"><b>Curriculum</b></label>
                                        <textarea class="form-control" id="curriculum" name="curriculum" rows="6">{{$userDetail->curriculum}}</textarea>`


                                        <label for="pic"><b>Immagine del profilo</b></label>
                                        <input class="form-control" type="file" name="pic" id="pic">

                                        <button type="submit" class="btn btn-success">Edit</button>


                                    </div>

                            </div>
                        </div>




            </form>



        </div>

    {{-- Semplice verifica che l'id estrapolato dall'URI non sia superiore agli utenti totali del database --}}
    @elseif($idInURL > count($users) || $idInURL === 0)

        <div class="col-xl-10 col-lg-10 mx-auto">
            <span>Spiacenti, il medico che hai richiesto non è presente nel nostro database.</span>
            <br>
            <span>Clicca <a href="/admin/doc/{{$user->id}}/edit">qui</a> per tornare alle modifiche del tuo profilo.</span>
        </div>

    @else

        <div class="col-xl-10 col-lg-10 mx-auto">
            <span>Stai cercando di modificare un profilo che non è il tuo.</span>
            <br>
            <span>Clicca <a href="/admin/doc/{{$user->id}}/edit">qui</a> per tornare alle modifiche del tuo profilo.</span>
        </div>

    @endif


    @endsection



