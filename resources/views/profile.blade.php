<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME', 'KANCAMU') }}</title>
    <link rel="icon" href="{{ asset('asset/logo.png') }}">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />

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
</head>

<body>

    @include('layouts.navbar')
    <div class="container">
        <main style="margin-bottom: 200px; margin-top: 100px;">
            <div class="card shadow" style="border: 0px;">
                <div class="card-body">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row m-5 gap-5">
                            <div class="col-4 text-center">
                                <h3 class="verdana-light">Profile Saya</h3>
                                <br><br>
                                <img src="{{ $user->profile }}" class="img-fluid rounded-pill" id="previewImage"
                                    style="height: 250px;" alt="">
                                <br><br>
                                <input name="profile" id="profile" type="file" class="form-control mt-2"
                                    accept="image/">
                            </div>
                            <div class="col-7 align-items-center">
                                <div class="form-group">
                                    <label for="email"
                                        class="col-form-label verdana-light">{{ __('Email') }}</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email', $user->email) }}" placeholder="Masukkan Email" required
                                        autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name"
                                        class="col-form-label verdana-light">{{ __('Nama Lengkap') }}</label>
                                    <input id="name" type="name"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name', $user->name ?? '') }}"
                                        placeholder="Masukkan Nama Lengkap" required autocomplete="email" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label verdana-light">{{ __('Jenis Kelamin') }}</label>
                                    <br>
                                    <div class="d-flex gap-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" value="male"
                                                id="male" {{ $user->gender == 'male' ? 'checked' : '' }}>
                                            <label class="form-check-label verdana-light" for="male"
                                                style="font-size: 12px">Laki - laki</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" value="female"
                                                id="female" {{ $user->gender == 'female' ? 'checked' : '' }}>
                                            <label class="form-check-label verdana-light" for="female"
                                                style="font-size: 12px">Perempuan</label>
                                        </div>
                                    </div>
                                    @error('gender')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="birthdate"
                                            class="col-form-label verdana-light">{{ __('Tanggal Lahir') }}</label>
                                        <input id="birthdate" type="date"
                                            class="form-control @error('birthdate') is-invalid @enderror"
                                            name="birthdate" value="{{ old('birthdate', $user->birthdate ?? '') }}"
                                            required autocomplete="email" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="whatsapp"
                                            class="col-form-label verdana-light">{{ __('Nomor Whatsapp') }}</label>
                                        <input id="whatsapp" type="number" min="1"
                                            class="form-control @error('whatsapp') is-invalid @enderror"
                                            name="whatsapp" value="{{ old('whatsapp', $user->whatsapp ?? '') }}"
                                            placeholder="081234567890" required autocomplete="email" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password"
                                        class="col-form-label verdana-light">{{ __('Password') }}</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        placeholder="Masukkan Password" placeholder="Masukkan Password Ulang"
                                        autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation"
                                        class="col-form-label verdana-light">{{ __('Ulangi Password') }}</label>
                                    <input id="password_confirmation" type="password"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        name="password_confirmation" placeholder="Masukkan Password"
                                        autocomplete="new-password">
                                    @error('password_confirmation')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success rounded"
                                    style="width: 120px;">{{ __('Simpan') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>

        @include('layouts.footer')
    </div>
    @stack('js')
    <script type="module">
        $(document).ready(function() {
            $('#profile').change(function() {
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("profile").files[0]);

                oFReader.onload = function(oFREvent) {
                    document.getElementById("previewImage").src = oFREvent.target.result;
                };
            })
        })
    </script>
</body>

</html>
