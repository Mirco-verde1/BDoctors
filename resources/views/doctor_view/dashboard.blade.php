@extends('layouts.app')

@section('content')


        <div class="container-fluid">
            <div class="row">

                        <nav class="col-md-2 d-none d-md-block bg-light sidebar navbar-expand-md">
                        <div class="sidebar-sticky ">

                            <figure class="doctor-pic-dashboard-container ">
                                <a href="../doctor/{{$user->id}}"><img class="doctor-pic" src="{{ URL::asset('storage/'.$user->detail->pic) }}" alt="{{ Auth::user()->name }} {{ Auth::user()->lastname }}"></a>
                            </figure>

                            <div class="collapse navbar-collapse margin-top-container" id="navbarSupportedContent">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#">
                                        <span data-feather="home"></span>
                                        Dashboard <span class="sr-only">(current)</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../admin/doc/{{$user->id}}/edit ">
                                        <span data-feather="home"></span>
                                        Modifica il profilo
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../myMessages/{{$user->id}}">
                                        <span data-feather="file"></span>
                                        Messaggi ricevuti
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../myReviews/{{$user->id}}">
                                        <span data-feather="shopping-cart"></span>
                                        Recensioni ricevute
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                        <span data-feather="users"></span>
                                        Sponsorizzazione profilo
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                        <span data-feather="bar-chart-2"></span>
                                        Statistiche
                                        </a>
                                    </li>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#exampleModalCenter{{ $user->id }}">
                                        ELIMINA PROFILO
                                    </button>

                                    {{-- modale --}}
                                    <div class="modal fade" id="exampleModalCenter{{ $user->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" data-backdrop="false">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">SEI SICURO DI VOLER ELIMINARE IL PROFILO?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    L'AZIONE E' IRREVERSIBILE
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                                                    <form action="{{ route('doc.destroy', $user->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Elimina</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- fine modale --}}

                                </ul>

                        </div>
                        </nav>

                        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">


                                <h1 class="h2">Dashboard</h1>
                                <div class="btn-toolbar mb-2 mb-md-0">
                                <div class="btn-group mr-2">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                                </div>
                                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                                    <span data-feather="calendar"></span>
                                    This week
                                </button>
                                </div>
                            </div>

                                <div class="card-deck">

                                    {{-- card messaggi ricevuti --}}
                                    <div class="card">
                                        <nav id="secondary-nav" class="text-center">
                                            <div>
                                                <ul>
                                                    <li class="active-nav">
                                                        <b>Messaggi ricevuti</b>
                                                    </li>
                                                </ul>
                                            </div>
                                        </nav>
                                        <div class="card-body text-left">
                                            <div>

                                                <small class="text-muted text-capitalize d-block">Nome: {{$message->name}}</small>
                                                <small class="text-muted">Email: {{$message->email}}</small>
                                                    <p class="margin-top-container">{{$message->body}}</p>

                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <small class="text-muted">Ultimo messaggio ricevuto il {{ \Carbon\Carbon::parse($message->updated_at)->format('d/m/Y')}}</small>
                                            <small class="text-muted">alle {{ \Carbon\Carbon::parse($message->updated_at)->format('H:i:s')}}</small>
                                        </div>
                                    </div>

                                    {{-- card recensoni ricevute --}}
                                    <div class="card">
                                        <nav id="secondary-nav" class="text-center">
                                            <div>
                                                <ul>
                                                    <li class="active-nav">
                                                        <b>Recensioni ricevute</b>
                                                    </li>
                                                </ul>
                                            </div>
                                        </nav>
                                        <div class="card-body text-left">
                                            <div>


                                                        <small class="text-muted text-capitalize d-block">Nome: {{$review->name}}</small>
                                                        <small class="text-muted">Email: {{$review->email}}</small>
                                                        <p>{{$review->body}}</p>



                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <small class="text-muted">Ultima recensione ricevuta il {{ \Carbon\Carbon::parse($review->created_at)->format('d/m/Y')}}</small>
                                            <small class="text-muted">alle {{ \Carbon\Carbon::parse($review->created_at)->format('H:i:s')}}</small>
                                        </div>
                                    </div>

                                    {{-- card sponsorizzazione profilo --}}
                                    <div class="card">
                                            <nav id="secondary-nav" class="text-center">
                                                <div>
                                                    <ul>
                                                        <li class="active-nav">
                                                            <b>Sponsorizzazione</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </nav>
                                        <div class="card-body">
                                            <div>

                                            </div>
                                        </div>
                                        <div class="card-footer">
                                        <small class="text-muted">Last updated 3 mins ago</small>
                                        </div>
                                    </div>

                                </div>

                        </main>

            </div>
        {{-- row --}}
        </div>
        {{-- container fluid --}}
            {{-- Semplice verifica che l'id estrapolato dall'URI non sia superiore agli utenti totali del database --}}


