    @extends('layouts.app')

    <title>{{ __('BDoctors - Modifica Profilo') }}</title>
    <script src="https://unpkg.com/vue-multiselect@2.1.0"></script>
    <link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css">
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

            <nav class="secondary-nav">
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
                            <div class="col-md-5 offset-col-md-2">
                                <figure class=" doctor-pic-show-container">
                                    @if(file_exists('storage/'.$user->detail->pic))

                                        <img class="doctor-pic-show" src="{{ URL::asset('storage/'.$user->detail->pic)}}"
                                            alt="{{$user->name}} {{$user->lastname}}">

                                    @else

                                        <img class="doctor-pic-show" src="https://cdn4.iconfinder.com/data/icons/small-n-flat/24/user-alt-512.png"
                                            alt="{{$user->name}} {{$user->lastname}}">

                                    @endif
                                </figure>
                            </div>
                            {{-- name --}}
                            <div class="col-md-5 align-self-center">
                                <label class="" for="name"><b>Name</b></label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Insert your name" value="{{$user->name}}" required>
                                <br>
                                {{-- last name --}}
                                <label class="" for="lastname"><b>Lastname</b></label>
                                <input type="text" name="lastname" id="lastname" class="form-control"
                                    placeholder="Insert your lastname" value="{{$user->lastname}}" required>
                                <br>
                            </div>
                        </div>
                        <div class="row container-box2">

                            {{-- address --}}
                            <div class="col-md-4">
                                <label class="" for="address"><b>Address</b></label>
                                <input type="text" name="address" id="address" class="form-control"
                                    placeholder="Insert your address" value="{{$user->address}}" required>
                            </div>
                            {{-- Email --}}
                            <div class="col-md-4">
                                <label class="" for="email"><b>Email</b></label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Insert your email" value="{{$user->email}}" required>
                            </div>
                            {{-- <label class="" for="password">Password</label>
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Change your password">
                                            <br> --}}
                            {{-- phone --}}
                            <div class="col-md-4">
                                <label class="" for="phone"><b>Phone</b></label>
                                <input type="text" name="phone" id="phone" class="form-control"
                                    placeholder="Insert your phone" value="{{$userDetail->phone}}">
                            </div>
                        </div>
                        {{-- departments --}}
                        {{-- <div class="text-center mt-4">
                        <label for="departments"><b>Departments</b></label>
                        <select class="form-control h-25" name="departments[]" id="departments" multiple>
                            @foreach($departments as $department)
                                <option value="{{$department->id}}">{{$department->type}}</option>
                            @endforeach
                        </select>
                        </div> --}}
                        <multiple-select-departments></multiple-select-departments>


                        {{-- curriculum --}}
                        <div class="text-center mt-4">
                        <label for="curriculum"><b>Curriculum</b></label>
                        <textarea style="resize: none;" class="form-control " id="curriculum" name="curriculum" rows="10">
                            {{$userDetail->curriculum}}
                        </textarea>`
                        </div>

                        {{-- upload --}}
                        <div class="text-center">
                            <label for="pic"><b>Immagine del profilo</b></label>
                            <input class="form-control p-2 height-input " type="file" name="pic" id="pic">

                            <button type="submit" class="btn btn-success mt-4">Edit</button>
                        </div>


                    </div>
                </div>
            </div>
        </form>
    </div>
    {{-- Semplice verifica che l'id estrapolato dall'URI non sia superiore agli utenti totali del database --}}
    @elseif($idInURL > count($users) || $idInURL === 0)

        <div class="col-xl-10 col-lg-10 mx-auto">
            <div class="container">
                <div class="row">
                    <div class="text-left row">
                        <div class="col-lg-7 col-md-7 col-sm-11 text">
                            <span>Spiacenti, il medico che hai richiesto non è presente nel nostro database.</span>
                            <br>
                            <br>
                            <span>Clicca <a href="/admin/doc/{{$user->id}}/edit">qui</a> per tornare alle modifiche del tuo profilo.</span>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-11">
                            <img class="img-fluid doctor-clipart" src="../../../img/doctor-clipart.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @else

        <div class="col-xl-10 col-lg-10 mx-auto">
            <div class="col-xl-10 col-lg-10 mx-auto">
                <div class="container">
                    <div class="row">
                        <div class="text-left row">
                            <div class="col-lg-7 col-md-7 col-sm-11 text">
                                <span>Stai cercando di modificare un profilo che non è il tuo.</span>
                                <br>
                                <br>
                                <span>Clicca <a href="/admin/doc/{{$user->id}}/edit">qui</a> per tornare alle modifiche del tuo profilo.</span>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-11">
                                <img class="img-fluid doctor-clipart" src="../../../img/doctor-clipart.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endif


    @endsection
