@extends('layouts.app')

    <title>{{ __('BDoctors - Show') }}</title>

    @section('content')

        <div id="app">
            <div class="container margin-top-container">
                <div class="row">

                    @if(isset($user->id))

                        <div class="col-xl-10 col-lg-10 mx-auto">
                            <nav id="secondary-nav">
                                <div>
                                    <ul>
                                        <li class="active-nav">
                                            Info Generali
                                        </li>
                                        <li>
                                            <a class="">Recensioni</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>

                            {{-- box con shadow --}}
                            <div class="box-general">
                                <div class="profile">

                                    <div class="row">

                                        <figure class="doctor-pic-show-container">
                                            <img class="doctor-pic-show" src="{{ URL::asset('storage/'.$user->detail->pic) }}" alt="{{$user->name}} {{$user->lastname}}">
                                        </figure>

                                        <div class="col-lg-7 col-md-8 info">
                                            <h1>{{$user->name}} {{$user->lastname}}</h1>

                                            @foreach ($user->departments as $department)
                                                <h5 class="department">{{$department->type}}</h5>
                                            @endforeach

                                            @foreach ($user->votes as $vote)

                                            <span>
                                                @for ($f = 0; $f < $vote->value; $f++)
                                                    <i class="fas fa-star"></i>
                                                @endfor

                                                @for ($e = 0; $e < 5 - $vote->value; $e++)
                                                    <i class="far fa-star"></i>
                                                @endfor

                                            </span>


                                            @endforeach


                                            {{-------------------------------------------- qui inserire medical services --------------------------------------------}}

                                        </div>

                                    </div>

                                </div>
                            </div>


                            {{--************ CONTATTI ************--}}

                            <nav id="secondary-nav" class="margin-top-container">
                                <div>
                                    <ul class="justify-content-center">
                                        <li>
                                            <b class="active-nav">Contatti</b>
                                        </li>
                                    </ul>
                                </div>
                            </nav>

                            <div class="box-general">
                                <div class="profile">

                                    <div class="row">
                                        <div class="contacts">
                                            <h2>Indirizzo: {{$user->address}}</h2>

                                            <h2>Email: {{$user->email}}</h2>

                                            <h2>{{$user->detail->phone}}</h2>
                                        </div>

                                    </div>

                                </div>
                            </div>


                            {{--************ CURRICULUM ************--}}

                            <nav id="secondary-nav" class="margin-top-container">
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
                                        <h3>{{$user->detail->curriculum}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--************ RECENSIONE ************--}}

                            <nav id="secondary-nav" class="margin-top-container">
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
                                                <label for="name" class="form-label">Name</label>
                                                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" type="text" name="name" placeholder="Name">
                                                <div class="invalid-tooltip">
                                                    {{ $errors->first('name') }}
                                                </div>
                                            </div>

                                            <div class="form-group position-relative">
                                                <label for="email">Email</label>
                                                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" type="text" name="email" placeholder="Email">
                                                <div class="invalid-tooltip">
                                                    {{ $errors->first('email') }}
                                                </div>
                                            </div>

                                            <div class="form-group position-relative">
                                                <label for="body">Body</label>
                                                <textarea class="form-control {{ $errors->has('body') ? 'is-invalid' : ''}}" type="text" name="body" placeholder="Body" rows="6"></textarea>
                                                <div class="invalid-tooltip">
                                                    {{ $errors->first('body') }}
                                                </div>
                                            </div>

                                            <input type="submit" value="Send">
                                        </form>
                                    </div>
                                </div>
                            </div>






                        </div>

                    @else
                        <div class="col-xl-10 col-lg-10 mx-auto">
                            <span>Spiacenti, il medico che hai richiesto non è presente nel nostro database.</span>
                        </div>
                    @endif

                </div>
                {{-- row --}}

            </div>
            {{-- container --}}

        </div>

    @endsection
