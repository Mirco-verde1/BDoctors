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

            
            <div>
                @foreach ($messages as $message)
                    <h2>{{$review->name}}</h2>
                    <h4>{{$review->email}}</h4>
                    <p>{{$review->body}}</p>
                @endforeach
            </div>

        </div>

    {{-- Semplice verifica che l'id estrapolato dall'URI non sia superiore agli utenti totali del database --}}
    @elseif($idInURL > count($users) || $idInURL === 0)

        <div class="col-xl-10 col-lg-10 mx-auto">
            <span>Spiacenti, il medico che hai richiesto non è presente nel nostro database.</span>
            <br>
            <span>Clicca <a href="/myMessages/{{$user->id}}">qui</a> per tornare ai messaggi del tuo profilo.</span>
        </div>

    @else

        <div class="col-xl-10 col-lg-10 mx-auto">
            <span>Stai cercando di visualizzare i dati di un profilo che non è il tuo.</span>
            <br>
            <span>Clicca <a href="/myMessages/{{$user->id}}">qui</a> per tornare ai messaggi del tuo profilo.</span>
        </div>

    @endif


    @endsection