@extends('layouts.app')
@push('css')
    <style>
        .textover {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .overflow {
            font-size: 9px;
            height: 60px;
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .img {
            max-height: 95px;
            margin: 4px;
        }

        @media (max-width: 768px) {
            .textover {
                font-size: 14px;
            }
            .verdana-bold {
                font-size: 16px;
            }
        }
    </style>
@endpush
@section('content')
    <div style="position: relative; text-align: center;">
        <img src="{{ asset('asset/background-header.svg') }}" alt="" class="img-fluid w-100 h-100">
        <div class="textover">
            <h3 class="verdana-bold">Selamat Datang di</h3>
            <img src="{{ asset('asset/logo.png') }}" class="img-fluid" style="height: 49px;" alt="">
        </div>
    </div>
    <div class="container mt-2">

        <!-- Mood -->
        <div>
            <div class="text-center">
                <h4 class="verdana-semibold">Bagaimana mood mu hari ini?</h4>
            </div>
            <div class="row justify-content-center gap-4 mt-5 mb-5 text-center">
                @php
                    $moods = [
                        ['name' => 'Sedih', 'img' => 'sedih.svg'],
                        ['name' => 'Terharu', 'img' => 'terharu.svg'],
                        ['name' => 'Kecewa', 'img' => 'kecewa.svg'],
                        ['name' => 'Marah', 'img' => 'marah.svg'],
                        ['name' => 'Senang', 'img' => 'senang.svg'],
                        ['name' => 'Biasa Aja', 'img' => 'biasa.svg'],
                    ];
                @endphp
                @foreach ($moods as $mood)
                    <figure class="col-4 col-md-2">
                        <a href="{{ route('mood.index') }}" class="text-black text-decoration-none">
                            <img src="{{ asset('asset/beranda/' . $mood['img']) }}" alt="" class="img-fluid rounded"
                                style="width: 100px; height: 100px">
                            <figcaption class="verdana-light mt-1">{{ $mood['name'] }}</figcaption>
                        </a>
                    </figure>
                @endforeach
            </div>
        </div>
        <!-- EndMood -->

        <!-- Depression -->
        <div class="card shadow mt-5">
            <div class="card-body">
                <div class="d-flex flex-column flex-md-row">
                    <div class="flex-fill text-start">
                        <img src="{{ asset('asset/beranda/Anxiety-amico.png') }}" alt="" class="img-fluid"
                            style="width: 200px; height: 200px">
                    </div>
                    <div class="flex-fill col-12 col-md-7 text-center mt-3 mb-3">
                        <p class="verdana-light" style="font-size: 15px">Hai ! Bagaimana kabarmu hari ini ?</p>
                        <br>
                        <p class="verdana-light" style="font-size: 15px">Apapun perasaan yang kamu rasakan hari ini, aku berharap kamu tetap kuat ya,
                            jangan pernah menyerah atas semua permasalahan yang kamu lalui. Sudah waktunya untuk menghargai dan mencintai diri sendiri,
                            Terkadang semua memang terasa tidak adil dan akhirnya merasa tertekan. Tapi tahukah kamu ? seseorang yang merasa tertekan
                            cenderung mengalami depresi loh, terkadang seseorang yang mengalami depresi menganggap sepele hal ini. Tetapi bisa menjadi
                            dampak buruk bagi kehidupanmu. Maka dari itu ikutilah tes ini untuk mengetahui apakah kamu mengalami depresi atau tidak</p>
                        <br>
                        <a href="{{ route('test.index') }}" class="btn"
                            style="background-color: #68B1B7; width: 130px; border-radius: 13px;">Selanjutnya</a>
                    </div>
                    <div class="flex-fill text-end">
                        <img src="{{ asset('asset/beranda/Anxiety-cuate.png') }}" alt="" class="img-fluid"
                            style="width: 200px; height: 200px">
                    </div>
                </div>
            </div>
        </div>
        <!-- EndDepression -->

        <!-- Test -->
        <div class="row justify-content-center mt-4">
            <div class="col-12 col-md-11">
                <div class="card shadow mt-4" style="background-color: #EBF2FA">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ asset('asset/beranda/Honesty-pana.png') }}" alt="..." class="img-fluid"
                                style="height: 200px;">
                            <h5 class="verdana-semibold">Tes Tingkat Depresi : Mari Mengenal Diri Sendiri</h5>
                        </div>
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="verdana-light mt-4 w-75 items-center" style="font-size: 15px">
                                <p>Baca petunjuk pengisiannya, yuk!</p>
                                <ol>
                                    <li>Tidak ada jawaban yang benar atau salah ya, Jawab sesuai apa yang kamu
                                        rasakan</li>
                                    <li>Tes ini tidak ada batasan waktu jadi tidak usah terburu-buru</li>
                                    <li>Cari tempat yang menurutmu nyaman saat menjawab tes ini</li>
                                    <li>Hasil tes bisa langsung didapat setelah mengirim semua jawaban
                                    </li>
                                </ol>
                                <p class="mt-4">Selamat mengisi teman-teman ^^</p>
                            </div>
                        </div>
                        <div class="text-center mt-5 mb-5">
                            <h6 class="verdana-semibold">Apa Kamu Ingin Memulai Tes?</h6>
                            <a href="{{ route('test.index') }}" class="btn"
                                style="background-color: #68B1B7; width: 80px; border-radius: 13px;">Ya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- EndTest -->

        <!-- Article -->
        <div class="mt-5 mb-5">
            <div class="text-center mb-5">
                <h4 class="verdana-semibold">Artikel Mengenai Depresi</h4>
            </div>

            <div class="row">
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($articles as $key => $datas)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <div class="row">
                                    @foreach ($datas as $article)
                                        <div class="col-12 col-md-4">
                                            <div class="card">
                                                <div class="card-body verdana-light">
                                                    <h6 class="text-center mb-4 mt-3">{{ $article->title }}</h6>
                                                    <div class="text-center">
                                                        <img src="{{ $article->thumbnail }}" alt="..."
                                                            class="img-fluid rounded"
                                                            style="height: 120px; width: 100%; object-fit: cover;">
                                                    </div>
                                                    <div class="m-4" style="font-size: 9px">
                                                        <div class="overflow">
                                                            {!! $article->content !!}
                                                        </div>
                                                        <div class="text-center mt-4">
                                                            <a href="{{ route('article', $article->id) }}"
                                                                class="btn btn-sm btn-outline-info rounded-pill">
                                                                <p style="font-size: 10px">Selengkapnya</p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <!-- EndArticle -->

        <!-- Partner -->
        <div class="mt-5">
            <div class="text-center">
                <h4 class="verdana-semibold">Partner Kami</h4>
            </div>
            <div class="text-center row">
                @php
                    $partners = [
                        'centrale.png', 'smp pgri pujon.png', 'mtsn kediri.png', 'arab.png',
                        'muhammadiyah boarding school.png', 'smp muhammadiyah malang.png', 'al-ishlah.png',
                        'al-munnawariyah.png', 'panti asuhan muhammadiyah.png', 'umm.png', 'arunika.png',
                        'aremania.png', 'reveals.png', 'restorasi.png', 'imm.png', 'cuan.png', 'x.png'
                    ];
                @endphp
                @foreach ($partners as $partner)
                    <div class="col-4 col-md-2 mb-3">
                        <img class="img-fluid img" src="{{ asset('asset/logo partner/' . $partner) }}" alt="">
                    </div>
                @endforeach
            </div>
        </div>
        <!-- EndPartner -->

    </div>
@endsection
