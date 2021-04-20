<div class="container d-flex flex-row p-2 flex-wrap">


  @foreach ($users as $user)
<div class="card col-md-3 p-2 bd-highlight doctor-card" style="width: 18rem;">
    {{-- <img class="card-img-top" src="{{$user->detail['pic']}}" alt="Card image cap"> --}}
    <div class="card-body">
      <h5 class="card-title">{{$user->name}} {{$user->lastname}}</h5>
      @foreach($user->departments as $department)
      <p class="card-text">{{$department->type}}</p>
      @endforeach
      <a class="query-submit btn btn-outline-success my-2 my-sm-0 btn-register" href="doctor/{{$user->id}}">Info Dottore</a>
    </div>
  </div>

@endforeach
</div>


