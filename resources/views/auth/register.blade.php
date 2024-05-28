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

        .col-form-label {
            font-size: 13px
        }

        .form-group {
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <div class="ms-5 mt-2">
        <a href="/">
            <img src="{{ asset('asset/logo.png') }}" style="height: 49px;" alt="">
        </a>
    </div>
    <div class="container mb-5">
        <br>
        <div class="row justify-content-center mt-5">
            <div class="col-md-4 row justify-content-center me-5">
                <div class="text-center">
                    <h2 class="verdana-regular">Selamat Datang di</h2>
                    <br>
                    <h2 class="verdana-regular">{{ env('APP_NAME', 'KANCAMU') }}</h2>
                    <br>
                    <p class="verdana-light mt-5">Sudah punya akun? <a href="login">Masuk Yuk</a></p>
                    <hr>
                </div>

                <form method="POST" action="{{ route('register') }}" class="verdana-light">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="col-form-label">{{ __('Email') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Masukkan Email" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-form-label">{{ __('Nama Lengkap') }}</label>
                        <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama Lengkap" required autocomplete="email" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">{{ __('Jenis Kelamin') }}</label>
                        <br>
                        <div class="d-flex gap-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="male" id="male">
                                <label class="form-check-label" for="male" style="font-size: 12px">Laki - laki</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="female" id="female">
                                <label class="form-check-label" for="female" style="font-size: 12px">Perempuan</label>
                            </div>
                        </div>
                        @error('gender')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="birthdate" class="col-form-label">{{ __('Tanggal Lahir') }}</label>
                            <input id="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ old('birthdate') }}" required autocomplete="email" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="whatsapp" class="col-form-label">{{ __('Nomor Whatsapp') }}</label>
                            <input id="whatsapp" type="number" min="1" class="form-control @error('whatsapp') is-invalid @enderror" name="whatsapp" value="{{ old('whatsapp') }}" placeholder="081234567890" required autocomplete="email" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukkan Password" placeholder="Masukkan Password Ulang" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation" class="col-form-label">{{ __('Ulangi Password') }}</label>
                        <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Masukkan Password" required autocomplete="new-password">
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-info rounded-pill" style="width: 120px;">{{ __('Daftar') }}</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <img src="{{ asset('asset/login & regist.png') }}" class="img-fluid" alt="">
            </div>
        </div>
    </div>
</body>

</html>
