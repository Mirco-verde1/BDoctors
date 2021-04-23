@extends('layouts.app')

<title>{{ __('BDoctors - Checkout') }}</title>


@section('content')



    <!doctype html>
    <html lang="{{ app()->getLocale() }}">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Braintree-Demo</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
    <div class="container">
    <div class="row">
    <div class=" col-md-12 ">
        <form action="{{route('sponsorship.store')}}" method="post">
            @csrf
        @method('POST')

        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h1 class="display-4">Scelga la sua sponsorizzazione:</h1>
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
                    <li>Il profilo verrá</li>
                    <li>visualizzato per</li>
                    <li>{{$sponsor->duration}}h in homepage</li>
                  </ul>
                   <span class="style-radio " role="group" aria-label="Basic radio toggle button group">
                  <input type="radio" class="btn-check" name="sponsor" id="sponsor{{$sponsor->id}}" value="{{$sponsor->id}}" autocomplete="off" >
                  <label class="btn btn-outline-primary checkmark " for="sponsor{{$sponsor->id}}">{{$sponsor->type}}</label>
                </span>

                </div>
              </div>
              @endforeach
            </div>

    <div id="dropin-container"></div>

    {{-- <input class="btn-check" type="radio" name="sponsor" value="{{$sponsor->id}}"> --}}


    <button class="btn btn-success" id="submit-button">Completa il tuo pagamento</button>

</form>
    </div>
</div>


    <script>
    var button = document.querySelector('#submit-button');
    braintree.dropin.create({
    authorization: "sandbox_x6mvdvj5_r7czy6mhvckbb4v2",
    container: '#dropin-container'
    }, function (createErr, instance) {
    button.addEventListener('click', function () {
    instance.requestPaymentMethod(function (err, payload) {
    $.get('{{ route('payment.make') }}', {payload}, function (response) {
    if (response.success) {
    alert('Payment successfull!');
    } else {
    alert('Payment failed');
    }
    }, 'json');
    console.log(err);
    });
    });
    });
    </script>
    @endsection
