<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{ asset('js/app.js') }}"></script>
    <title>Document</title>
</head>
<body>

    @php
        if (isset($edit) && !empty($edit)) {
            $method = 'PATCH';
            $url = route('review.update', compact('review'));
        } else {
            $method = 'POST';
            $url = route('review.store');
        }
    @endphp

    <div class="container">
    {{-- <a href="{{ route('show.doctor') }}">
        <button type="submit" class="btn btn-primary home-button">
            <i class="fas fa-home"></i>
        </button>
    </a> --}}

        <form action="{{ $url }}" method="post">
            @csrf
            @method($method)

            <div class="form-group position-relative">
                <label for="name" class="form-label">Name</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" type="text" name="name" placeholder="Name" value="{{isset($review) ? $review->name : '' }}">
                <div class="invalid-tooltip">
                    {{ $errors->first('name') }}
                </div>
            </div>

            <div class="form-group position-relative">
                <label for="email">Email</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" type="text" name="email" placeholder="Email" value="{{isset($review) ? $review->email : '' }}">
                <div class="invalid-tooltip">
                    {{ $errors->first('email') }}
                </div>
            </div>

            <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control {{ $errors->has('body') ? 'is-invalid' : ''}}" type="text" name="body" placeholder="Body" rows="6" value="{{isset($review) ? $review->body : '' }}"></textarea>
                <div class="invalid-feedback">
                    {{ $errors->first('body') }}
                </div>
            </div>

            <input type="submit" value="Send">
        </form>
    </div>

</body>
</html>
