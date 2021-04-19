@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card margin-top-container">

                <a href="/" class=" btn btn-outline-success my-2 my-sm-0">{{ __('Home') }} <i
                        class="fas fa-home"></i></a>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    {{ __('Hello') }}
                    {{ Auth::user()->name }}
                    {{ Auth::user()->lastname }}{{ __('.') }} <br>
                    {{ __('You are now logged in.') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
