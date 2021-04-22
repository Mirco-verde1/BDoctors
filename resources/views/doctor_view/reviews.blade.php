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

            <nav id="secondary-nav" class="margin-top-container">
                <div>
                    <ul class="justify-content-center">
                        <li>
                            <b class="active-nav">Recensioni ricevute</b>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="box-general">
                <div class="profile">

                    <div class="row justify-content-md-center">

                        <div class="box-review">
                            @foreach ($reviews as $review)
                            <div class="container-review">
                                <div class="header-review d-flex justify-content-between">
                                    <h5 class="text-capitalize"><b>{{$review->name}}</b></h5>
                                    <h5><b>{{ \Carbon\Carbon::parse($review->created_at)->format('d/m/Y')}}</b></h5>
                                </div>
                                <span>{{$review->body}}</>
                            </div>

                            @endforeach
                        </div>

                    </div>

                </div>
            </div>

        </div>

    {{-- Semplice verifica che l'id estrapolato dall'URI non sia superiore agli utenti totali del database --}}
    @elseif($idInURL > count($users) || $idInURL === 0)

        <div class="container">
            <div class="row">
                <div class="margin-top-container text-left row">
                    <div class="col-lg-7 col-md-7 text">
                        <span>Spiacenti, il medico che hai richiesto non è presente nel nostro database.</span>
                        <br>
                        <span class="bottom-text">Clicca <a href="/myReviews/{{$user->id}}">qui</a> per tornare alle recensioni
                            del tuo profilo.</span>
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <img class="img-fluid doctor-clipart" src="../../../img/doctor-clipart.png" alt="">
                    </div>
                </div>
            </div>
        </div>

    @else

        <div class="container">
            <div class="row">
                <div class="margin-top-container text-left row">
                    <div class="col-lg-7 col-md-7 text">
                        <span>Stai cercando di visualizzare i dati di un profilo che non è il tuo!</span>
                        <br>
                        <span class="bottom-text">Clicca <a href="/myReviews/{{$user->id}}">qui</a> per tornare alle recensioni
                            del tuo profilo.</span>
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <img class="img-fluid doctor-clipart" src="../../../img/doctor-clipart.png" alt="">
                    </div>
                </div>
            </div>
        </div>

    @endif


@endsection
