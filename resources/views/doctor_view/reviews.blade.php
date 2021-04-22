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
                            <b class="active-nav">Messaggi ricevuti</b>
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
                                       <h5><b>{{$review->name}}</b></h5>
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

        <div class="col-xl-10 col-lg-10 mx-auto">
            <span>Spiacenti, il medico che hai richiesto non è presente nel nostro database.</span>
            <br>
            <span>Clicca <a href="/myReviews/{{$user->id}}">qui</a> per tornare alle recensioni del tuo profilo.</span>
        </div>

    @else

        <div class="col-xl-10 col-lg-10 mx-auto">
            <span>Stai cercando di visualizzare i dati di un profilo che non è il tuo.</span>
            <br>
            <span>Clicca <a href="/myReviews/{{$user->id}}">qui</a> per tornare alle recensioni del tuo profilo.</span>
        </div>

    @endif


    @endsection
