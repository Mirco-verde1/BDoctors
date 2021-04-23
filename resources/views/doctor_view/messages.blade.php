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

            <nav class="secondary-nav margin-top-container">
                <div>
                    <ul class="justify-content-center">
                        <li>
                            <b class="active-nav">Messaggi ricevuti</b>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="box-general">
                <div class="profile">

                    <div class="row justify-content-md-center">

                        <div class="box-review">
                            @if (count($user->messages) > 0)
                                @foreach ($user->messages as $message)
                                    <div class="container-review">
                                        <div class="header-review d-flex justify-content-between">
                                        <h5><b>{{$message->name}}</b></h5>
                                        <h5><b>{{ \Carbon\Carbon::parse($message->created_at)->format('d/m/Y')}}</b></h5>
                                        </div>
                                    <span>{{$message->body}}</>
                                    </div>
                                @endforeach
                            @else
                                <h3>Non hai ancora ricevuto nessun messaggio.</h3>
                                <h4>Clicca <a href="/dashboard">qui</a> per tornare alla tua dashboard.</h4>
                            @endif
                        </div>
                    </div>

                </div>

            </div>
        </div>

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
