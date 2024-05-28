<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME', 'KANCAMU') }}</title>
    <link rel="icon" href="{{ asset('asset/logo.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        ::placeholder {
            /* Most modern browsers support this now. */
            color: rgb(255, 42, 0);
        }

        .form-control {
            background-color: #EEEEEE;
            padding: 14px;
            font-size: 11px
        }
    </style>
</head>

<body>
    <div class="ms-5 mt-2">
        <a href="/"><img src="{{ asset('asset/logo.png') }}" style="height: 49px;" alt=""></a>
    </div>
    <div class="container mb-5">
        <br>
        <div class="row justify-content-center mt-5 gap-5">
            <div class="col-md-4 row justify-content-center me-5">
                <div class="text-center">
                    <h2 class="verdana-regular">Selamat Datang di</h2>
                    <br>
                    <h2 class="verdana-regular">{{ env('APP_NAME', 'KANCAMU') }}</h2>
                    <br>
                    <p class="verdana-light mt-5">Belum punya akun? <a href="register">Daftar Yuk</a></p>
                    <hr>
                </div>
                <form method="POST" action="{{ route('login') }}" class="verdana-light">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="col-md-4 col-form-label" style="font-size: 13px">{{ __('Email') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Masukkan Email" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-md-4 col-form-label" style="font-size: 13px">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukkan Password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-info rounded-pill" style="width: 120px;">{{ __('Masuk') }}</button>

                        {{-- @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif --}}
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('asset/login & regist.png') }}" class="img-fluid" alt="">
            </div>
        </div>
    </div>
</body>

</html>
