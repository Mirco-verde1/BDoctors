        @extends('layouts.app')

        <title>{{ __('BDoctors - Homepage') }}</title>


        @section('content')
            <div id="app">
                <div class="jumbotron">
                    <div class="jumbotron-overlay">
                    </div>


                        <div class="jumbotron-container-title scale-in-center">
                            <span class="title"> Cerca il tuo dottore online</span>

                            <span class="subtitle">BDoctors</span>

                                <form action="http://127.0.0.1:8000/advance"  method="GET">
                                    <div class="form-group">
                                        <label for="department"></label>
                                        <select class="form-control select-department d-inline" id="department" name="department">
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->type }}">{{ $department->type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="query-submit btn btn-outline-success my-2 my-sm-0 d-inline"><i class="fa fa-search" aria-hidden="true"></i> Cerca specializzazione</button>
                                </form>
                        </div>


                </div>
                <div>
                    <h1 class="title-carousel">Dottori in evidenza </h1>
                </div>
                    @include('layouts/guest/partials/carousel')
                </div>
            </div>


        </div>


    @endsection



