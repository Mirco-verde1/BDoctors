@extends('layouts.app')
<title>{{ __('BDoctors - Checkout') }}</title>
@section('content')
    <div class="container">
    <div class="row">
    <div class=" col-md-12 ">
        <form action="{{route('sponsorship.store')}}" method="post">
            @csrf
        @method('POST')
        <div class="pricing-header text-center">
            <h1 class="title-checkout">Scelga la sua sponsorizzazione:</h1>
          </div>
            <div class="card-deck mb-3 text-center">


                @foreach ($sponsors as $sponsor)
              <div class="card mb-4 box-shadow">
                <div class="card-header">
                  <h4 class="my-0 font-weight-normal">{{$sponsor->type}}</h4>
                </div>
                <div class="card-body">
                  <h1 class="card-title pricing-card-title">{{$sponsor->price}}€ <small class="text-muted">/ {{$sponsor->duration}}h</small></h1>
                  <ul class="list-unstyled mt-3 mb-4">
                    <li>Il profilo verrà</li>
                    <li>visualizzato per</li>
                    <li>{{$sponsor->duration}}h in homepage</li>
                  </ul>
                </div>
                <span class="style-radio" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="sponsor" id="sponsor{{$sponsor->id}}" value="{{$sponsor->id}}" autocomplete="off" >
                    <label class="btn btn-outline-primary checkmark " for="sponsor{{$sponsor->id}}">{{$sponsor->type}}</label>
                  </span>
              </div>
              @endforeach
            </div>
            {{-- Permette al medico di sponsorizzarsi solo se non ha mai avuto una sponsorizzazione
            o se la precedente è scaduta --}}
            @if(!isset($activeSponsor) || \Carbon\Carbon::parse($activeSponsor['created_at'])->addHour($chosenSponsor->duration)->lte(\Carbon\Carbon::now()))
              <div id="dropin-container">

              </div>
              {{-- <input class="btn-check" type="radio" name="sponsor" value="{{$sponsor->id}}"> --}}
              <div>
                  <button class="btn btn-success button-pay" id="submit-button">Completa il tuo pagamento</button>
              </div>
            @else
              <h2 class="text-center text-bold">Hai già una sponsorizzazione in corso!</h2>
            @endif

</form>
    </div>
</div>
@endsection
