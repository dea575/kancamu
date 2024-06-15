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

    .navbar-brand img {
        height: 49px;
    }

    .nav-link p {
        margin: 0;
    }

    .dropdown-menu {
        right: 0;
        left: auto;
    }

    @media (max-width: 768px) {
        .navbar-nav {
            flex-direction: column;
        }

        .nav-item {
            margin-bottom: 10px;
        }

        .btn {
            font-size: 12px;
        }
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('asset/logo.png') }}" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">
                        <p class="verdana-semibold">Beranda</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('depression') ? 'active' : '' }}" href="{{ route('depression') }}">
                        <p class="verdana-semibold">Tentang Depresi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('test*') ? 'active' : '' }}" href="{{ route('test.index') }}">
                        <p class="verdana-semibold">Tes</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('mood*') ? 'active' : '' }}" href="{{ route('mood.index') }}">
                        <p class="verdana-semibold">Mood Harian</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('about-us') ? 'active' : '' }}" href="{{ route('about-us') }}">
                        <p class="verdana-semibold">Tentang Kami</p>
                    </a>
                </li>
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="btn btn-secondary" href="{{ route('login') }}">
                                <p class="verdana-semibold">Masuk</p>
                            </a>
                        </li>
                    @endif
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="btn btn-secondary" href="{{ route('register') }}">
                                <p class="verdana-semibold">Daftar Akun</p>
                            </a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ Auth::user()->profile }}" alt="" class="object-fit-cover border rounded-circle" style="width: 35px; height: 35px">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>