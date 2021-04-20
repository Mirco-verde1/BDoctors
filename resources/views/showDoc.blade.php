        @extends('layouts.app')


        @section('content')

            <div id="app">

                <img src="{{$user->detail->pic}}" alt="">

                <h1>Dottor/ssa: {{$user->name}} {{$user->lastname}}</h1>

                @foreach ($user->departments as $department)
                    <h2>Specializzazione: {{$department->type}}</h2>
                @endforeach

                <div class="contacts">
                    <h1>Contatti: </h1>
                    <h2>Indirizzo: {{$user->address}}</h2>

                    <h2>Email: {{$user->email}}</h2>

                    <h2>{{$user->detail->phone}}</h2>
                </div>

                <div class="curriculum">
                <h1>Curriculum: </h1>
                <h3>{{$user->detail->curriculum}}</h3>
                </div>

                <h1>Lascia una recensione</h1>


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
        @endsection
