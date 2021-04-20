@extends('layouts.app')

<title>{{ __('BDoctors - Modifica Profilo') }}</title>

@section('content')

<div class="container">

    <form method="post" action="{{ route('doc.update', $user->id) }}" enctype="multipart/form-data">

        @METHOD('PATCH')
        @csrf

                <nav id="secondary-nav">
                    <div>
                        <ul>
                            <li>
                                <a class="active-nav">Info Generali</a>
                            </li>
                            <li>
                                <a class="">Recensioni</a>
                            </li>
                        </ul>
                    </div>
                </nav>


                <div class="box-general">
                    <div class="profile">
                        <div class="row">


                            <div class="form-group d_flex_column">


                                <label class="" for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Insert your name" value="{{$user->name}}" required>
                                <br>


                                <label class="" for="lastname">Lastname</label>
                                <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Insert your lastname" value="{{$user->lastname}}" required>
                                <br>



                                <label class="" for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Insert your email" value="{{$user->email}}" required>
                                <br>

                                {{-- <label class="" for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Change your password">
                                <br> --}}

                                <label class="" for="address">Address</label>
                                <input type="text" name="address" id="address" class="form-control" placeholder="Insert your address" value="{{$user->address}}" required>
                                <br>

                                <label for="departments">Departments</label>
                                <select class="form-control" name="departments[]" id="departments" multiple>
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}"> {{$department->type}} </option>
                                    @endforeach
                                </select>

                                <label class="" for="phone">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="Insert your phone" value="{{$userDetail->phone}}">
                                <br>

                                <label for="curriculum">Curriculum</label>
                                <textarea class="form-control" id="curriculum" name="curriculum" rows="6"></textarea>

                                <label for="pic">Immagine del profilo</label>
                                <input class="form-control" type="file" name="pic" id="pic">

                                <button type="submit" class="btn btn-success">Edit</button>


                            </div>

                        </div>
                    </div>
                </div>




    </form>


            <h2>{{$user->name}}</h2>

</div>


@endsection




