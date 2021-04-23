@extends('layouts.app')

<title>{{ __('BDoctors - Show') }}</title>

@section('content')

<div id="app">
    <div class="container margin-top-container">
        <div class="row">

            @if(isset($user->id))

            <div class="col-xl-12 col-lg-12 mx-auto">
                <nav class="secondary-nav">
                    <div>
                        <ul class="d-flex justify-content-around">
                            <li class="active-nav">
                                Info Generali
                            </li>
                            <li>
                                <a href="#reviews-nav">Recensioni</a>
                            </li>
                            <li>
                                <a href="#curriculum-nav">Curriculum</a>
                            </li>
                            <li>
                                <a href="#add-reviews-nav">Lascia una recensione</a>
                            </li>
                        </ul>
                    </div>
                </nav>

                {{-- box con shadow --}}
                <div class="box-general">
                    <div class="profile">

                        <div class="row">
                            {{-- immagine dottore --}}
                            <figure class="doctor-pic-show-container">
                                @if(file_exists('storage/'.$user->detail->pic))

                                    <img class="doctor-pic-show" src="{{ URL::asset('storage/'.$user->detail->pic)}}"
                                        alt="{{$user->name}} {{$user->lastname}}">

                                @else

                                    <img class="doctor-pic-show" src="https://cdn4.iconfinder.com/data/icons/small-n-flat/24/user-alt-512.png"
                                        alt="{{$user->name}} {{$user->lastname}}">

                                @endif
                            </figure>

                            {{-- nome cognome dottore --}}
                            <div class="col-lg-6 offset-md-1 col-md-8 info">
                                <h1>{{$user->name}} {{$user->lastname}}</h1>

                                @foreach ($user->departments as $department)
                                    <h5 class="department">{{$department->type}}</h5>
                                @endforeach

                                @php
                                    $voteSum = 0;

                                    foreach ($user->votes as $vote) {
                                        $voteSum += $vote->value;
                                    }

                                    if(count($user->votes) > 0) {
                                        $voteAverage = $voteSum / count($user->votes);
                                    } else {
                                        $voteAverage = 0;
                                    }

                                @endphp

                                {{-- media voti dottore --}}
                                <span>
                                    Media voti:
                                    @for ($f = 0; $f < intval(ceil($voteAverage)); $f++)
                                        <i class="fas fa-star"></i>
                                    @endfor

                                    @for ($e = 0; $e < (5 - intval(ceil($voteAverage))); $e++)
                                        <i class="far fa-star"></i>
                                    @endfor
                                </span>

                                {{-- form per votare il dottore --}}
                                <form action="{{ route('send.vote', $user->id) }}" method="post">
                                    @csrf
                                    @method('POST')

                                    <label class="col-lg-12" for="votes[]">Vota dottore</label>
                                    <select class="form-control votes-form col-md-2 d-inline-block" id="votes[]" name="votes[]">
                                        @foreach ($votes as $vote)
                                        <option value="{{ $vote->id }}">{{ $vote->value }}</option>
                                        @endforeach
                                    </select>

                                    <input class="btn btn-success votes-input offset-md-1 col-md-2" type="submit" value="Invia">
                                </form>

                                {{-- form per inviare un messaggio al dottore --}}
                                <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h4 class="modal-title w-100 font-weight-bold">Scrivi un messaggio</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body mx-3">
                                            <div class="md-form mb-5">
                                            <i class="fas fa-user prefix grey-text"></i>
                                            <input type="text" id="form34" class="form-control validate">
                                            <label data-error="wrong" data-success="right" for="form34">Nome</label>
                                            </div>

                                            <div class="md-form mb-5">
                                            <i class="fas fa-envelope prefix grey-text"></i>
                                            <input type="email" id="form29" class="form-control validate">
                                            <label data-error="wrong" data-success="right" for="form29">E-mail</label>
                                            </div>

                                            <div class="md-form mb-5">
                                            <i class="fas fa-tag prefix grey-text"></i>
                                            <input type="text" id="form32" class="form-control validate">
                                            <label data-error="wrong" data-success="right" for="form32">Oggetto</label>
                                            </div>

                                            <div class="md-form">
                                            <i class="fas fa-pencil prefix grey-text"></i>
                                            <textarea type="text" id="form8" class="md-textarea form-control" rows="4"></textarea>
                                            <label data-error="wrong" data-success="right" for="form8">Messaggio</label>
                                            </div>

                                        </div>
                                        <div class="modal-footer d-flex justify-content-center">
                                            <button class="btn btn-success">Invia <i class="fas fa-paper-plane-o ml-1"></i></button>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-left">
                                <a href="" class="btn btn-primary btn-rounded mb-4" data-toggle="modal" data-target="#modalContactForm">Invia un messaggio a {{$user->name}} {{$user->lastname}}</a>
                                </div>

                                {{-- Servizi medici --}}
                                <div class="modal fade" id="modalSubscriptionForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h4 class="modal-title w-100 font-weight-bold">Servizi medici</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body mx-3">
                                            <div class="md-form mb-5">
                                                @foreach ($medicalServices as $medicalService)
                                                    <p>{{$medicalService->name}} {{$medicalService->price}}€</p> <hr>
                                                @endforeach
                                            </div>

                                        </div>
                                        <div class="modal-footer d-flex justify-content-center">
                                            <button class="btn btn-indigo">Send <i class="fas fa-paper-plane-o ml-1"></i></button>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-left">
                                <a href="" class="btn btn-secondary btn-rounded mb-4" data-toggle="modal" data-target="#modalSubscriptionForm">Visualizza tutte le prestazioni mediche</a>
                                </div>

                                <p>{{$medicalService->name}} {{$medicalService->price}}€</p> <hr>

                            </div>

                        </div>

                        {{-- info dottore --}}
                        <div class="column">
                            <span><b>Indirizzo:</b> {{$user->address}}</span>
                            <br>
                            <span><b>Email:</b> {{$user->email}}</span>
                            <br>
                            <span><b>Telefono:</b> {{$user->detail->phone}}</span>
                        </div>

                    </div>
                </div>


                {{--************ RECENSIONI ************--}}



                <nav id="reviews-nav" class="secondary-nav margin-top-container">
                    <div>
                        <ul class="justify-content-center">
                            <li>
                                <b class="active-nav">Recensioni</b>
                            </li>
                        </ul>
                    </div>
                </nav>

                <div class="box-general">
                    <div class="profile">

                        <div class="row justify-content-md-center">
                            @if (count($user->reviews) > 0)

                                @foreach ($user->reviews as $review)
                                    <div class="container-review col-md-11">
                                        <div class="header-review d-flex justify-content-between">
                                            <h5 class="text-capitalize"><b>{{$review->name}}</b></h5>
                                            <h5><b>{{ \Carbon\Carbon::parse($review->created_at)->format('d/m/Y')}}</b></h5>
                                        </div>
                                        <span>{{$review->body}}</>
                                    </div>
                                @endforeach

                            @else

                                <span class="text-muted">Questo dottore non ha ancora recensioni.</span>

                            @endif

                        </div>

                    </div>
                </div>


                {{--************ CURRICULUM ************--}}

                <nav id="curriculum-nav" class="secondary-nav margin-top-container">
                    <div>
                        <ul class="justify-content-center">
                            <li>
                                <b class="active-nav">Curriculum</b>
                            </li>
                        </ul>
                    </div>
                </nav>

                <div class="box-general">
                    <div class="profile">
                        <div class="row">
                            <div class="curriculum">
                                @if(isset($user->detail->curriculum))
                                    @markdown($user->detail->curriculum)
                                @else
                                    <span class="text-muted">Questo dottore non ha ancora inserito un curriculum.</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                {{--************ RECENSIONE ************--}}

                <nav id="add-reviews-nav" class="secondary-nav margin-top-container">
                    <div>
                        <ul class="justify-content-center">
                            <li>
                                <h1 class="active-nav">Lascia una recensione</h1>
                            </li>
                        </ul>
                    </div>
                </nav>

                <div class="box-general">
                    <div class="profile">
                        <div class="">
                            <form action="{{ route('review.store', [ 'user_id' => $user->id]) }}" method="post">
                                @csrf
                                @method('POST')

                                <div class="form-group position-relative">
                                    <label for="name" class="form-label">Nome</label>
                                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}"
                                        type="text" name="name" placeholder="Nome">
                                    <div class="invalid-tooltip">
                                        {{ $errors->first('name') }}
                                    </div>
                                </div>

                                <div class="form-group position-relative">
                                    <label for="email">Email</label>
                                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}"
                                        type="text" name="email" placeholder="Email">
                                    <div class="invalid-tooltip">
                                        {{ $errors->first('email') }}
                                    </div>
                                </div>

                                <div class="form-group position-relative">
                                    <label for="body">Testo </label>
                                    <textarea class="form-control {{ $errors->has('body') ? 'is-invalid' : ''}}"
                                        type="text" name="body" placeholder="Testo" rows="6"></textarea>
                                    <div class="invalid-tooltip">
                                        {{ $errors->first('body') }}
                                    </div>
                                </div>

                                <input class="btn btn-success" type="submit" value="Invia">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @else

                <div class="container">
                    <div class="row">
                        <div class="text-left row">
                            <div class="col-lg-7 col-md-7 col-sm-11 text">
                                <span>Spiacenti, il medico che hai richiesto non è presente nel nostro database.</span>
                                <br>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-11">
                                <img class="img-fluid doctor-clipart" src="../../../img/doctor-clipart.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>

            @endif

        </div>
        {{-- row --}}

    </div>
    {{-- container --}}

</div>

@endsection
