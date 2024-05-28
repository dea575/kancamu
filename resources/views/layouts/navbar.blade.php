<style>
    .active {
        color: #68B1B7;
    }

    p {
        margin: 0px;
    }

    .card-body {
        padding: 6px;
    }
</style>
<div class="ms-5 mt-2">
    <img src="{{ asset('asset/logo.png') }}" style="height: 49px;" alt="">
</div>
<div class="container">
    <div class="card shadow mt-2">
        <div class="card-body">
            <div class="d-flex">
                <div class="flex-fill"></div>
                <div class="flex-fill"></div>
                <div class="flex-fill d-flex align-items-center gap-4">
                    <a class="nav-link" href="/">
                        <p class="verdana-semibold {{ request()->is('/') ? 'active' : '' }}">Beranda</p>
                    </a>
                    <a class="nav-link" href="{{ route('depression') }}">
                        <p class="verdana-semibold {{ request()->is('depression') ? 'active' : '' }}">Tentang Depresi
                        </p>
                    </a>
                    <a class="nav-link" href="{{ route('test.index') }}">
                        <p class="verdana-semibold {{ request()->is('test*') ? 'active' : '' }}">Tes</p>
                    </a>
                    <a class="nav-link" href="{{ route('mood.index') }}">
                        <p class="verdana-semibold {{ request()->is('mood*') ? 'active' : '' }}">Mood Harian</p>
                    </a>
                    <a class="nav-link" href="{{ route('about-us') }}">
                        <p class="verdana-semibold {{ request()->is('about-us') ? 'active' : '' }}">Tentang Kami</p>
                    </a>
                </div>
                <div class="flex-fill d-flex gap-3">
                    @guest
                        @if (Route::has('login'))
                            <a class="btn btn-secondary" href="{{ route('login') }}">
                                <p class="verdana-semibold" style="font-size: 12px">Login</p>
                            </a>
                        @endif
                        @if (Route::has('register'))
                            <a class="btn btn-secondary" href="{{ route('register') }}">
                                <p class="verdana-semibold" style="font-size: 12px">Register</p>
                            </a>
                        @endif
                    @else
                        <a id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img src="{{ Auth::user()->profile }}" alt=""
                                class="object-fit-cover border rounded-circle" style="width: 35px; height: 35px">
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            @if (Auth::user()->Role->slug === 'admin')
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Admin</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
