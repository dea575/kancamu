@extends('layouts.app')
@push('css')
    <style>
        .textleft {
            position: absolute;
            top: 50%;
            right: 50%;
            transform: translate(-50%, -50%);
        }

        .textright {
            position: absolute;
            top: 50%;
            left: 67%;
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

        .topcard {
            position: absolute;
            top: -20px;
            align-self: center
        }
    </style>
@endpush
@section('content')
    <div style="position: relative; text-align: center;">
        <img src="{{ asset('asset/background-header.svg') }}" alt="" class="img-fluid w-100 h-100">
        <div class="textleft">
            <h3 class="verdana-bold">Apa itu Depresi?</h3>
        </div>
        <div class="textright">
            <img src="{{ asset('asset/fitur tentang depresi.png') }}" class="img-fluid" style="height: 249px;" alt="">
        </div>
    </div>
    <div class="container mt-2">

        <!-- Depression -->
        <div class="row justify-content-center">
            <div class="card shadow mt-5" style="border-radius: 20px; width: 70rem;">
                <div class="card-body row justify-content-center">
                    <div class="col-8 mt-3 mb-3 text-center">
                        <p class="verdana-light" style="font-size: 13px; line-height: 2.3;">
                            Depresi adalah gangguan mental yang memengaruhi perasaan, pemikiran, dan perilaku seseorang
                            dalam jangka waktu panjang. Gejalanya mencakup kesedihan yang berlebih, kehilangan minat
                            beraktivitas, perubahan berat badan, gangguan tidur, kelelahan, perasaan bersalah berlebihan,
                            susah berkonsentrasi, dan memikirkan tentang kematian. Tingkatdepresi pada sesorang dapat
                            disebabkan oleh berbagai faktor, seperti masalahkeluarga, masalah belajar dan masalah lingkungan
                            sosial disekitar. Berawal daristress yang tidak diatasi, seseorang dapat mengalami depresi
                            bahkan sampailevel depresi berat.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- EndDepression -->

        <!-- Type -->
        <div class="row mt-4">
            <div class="text-center mt-5 mb-5">
                <h4 class="verdana-semibold">Jenis Depresi</h4>
            </div>
            <div class="col-4">
                <div class="card" style="background-color: #4E5170; position: relative;">
                    <div class="card verdana-light topcard" style="background-color: #68B1B7; width: 160px;">
                        <div class="card-body text-center text-white">
                            Depresi Sedang
                        </div>
                    </div>
                    <div class="card-body row justify-content-center text-white">
                        <div class="col-9 text-center mb-4 " style="font-size: 9px">
                            <p class="verdana-light" style="font-size: 14px; line-height: 2.3;">
                                Depresi ringan adalah tingkat keparahan depresi yang menunjukkan gejala yang meresahkan,
                                tetapi tidak begitu parah sehingga tidak menghambat kemampuan seseorang untuk menjalani
                                kehidupan sehari-hari secara signifikan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card" style="background-color: #4E5170; position: relative;">
                    <div class="card verdana-light topcard" style="background-color: #68B1B7; width: 160px;">
                        <div class="card-body text-center text-white">
                            Depresi Sedang
                        </div>
                    </div>
                    <div class="card-body row justify-content-center text-white">
                        <div class="col-9 text-center mb-4 " style="font-size: 9px">
                            <p class="verdana-light" style="font-size: 14px; line-height: 2.3;">
                                Depresi ringan adalah tingkat keparahan depresi yang menunjukkan gejala yang meresahkan,
                                tetapi tidak begitu parah sehingga tidak menghambat kemampuan seseorang untuk menjalani
                                kehidupan sehari-hari secara signifikan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card" style="background-color: #4E5170; position: relative;">
                    <div class="card verdana-light topcard" style="background-color: #68B1B7; width: 160px;">
                        <div class="card-body text-center text-white">
                            Depresi Sedang
                        </div>
                    </div>
                    <div class="card-body row justify-content-center text-white">
                        <div class="col-9 text-center mb-4 " style="font-size: 9px">
                            <p class="verdana-light" style="font-size: 14px; line-height: 2.3;">
                                Depresi ringan adalah tingkat keparahan depresi yang menunjukkan gejala yang meresahkan,
                                tetapi tidak begitu parah sehingga tidak menghambat kemampuan seseorang untuk menjalani
                                kehidupan sehari-hari secara signifikan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- EndType -->

        <!-- Handling -->
        <div class="row justify-content-center mt-4">
            <div class="col-11">
                <div class="card shadow mt-4">
                    <div class="card-body">
                        <div class="text-center mt-4">
                            <h5 class="verdana-semibold">Cara Penanganan Depresi Secara Mandiri</h5>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-4">
                            <div class="verdana-light mt-4 w-75 items-center" style="font-size: 13px">
                                <ol>
                                    <li class="m-3">Pahami gejala depresi: Mengetahui gejala depresi dapat membantu untuk
                                        identifikasi masalah yang sedang dihadapi. </li>
                                    <li class="m-3">Berbicara dengan seseorang: Berbagi perasaan dan pengalaman dengan
                                        teman, keluarga, atau orang yang percayai dapat memberikan dukungan emosional.
                                        Jangan ragu untuk meminta bantuan.</li>
                                    <li class="m-3">Aktivitas fisik: Olahraga teratur dapat membantu meningkatkan suasana
                                        hati dan mengurangi tingkat stres. Pilihlah aktivitas fisik yang diminati..</li>
                                    <li class="m-3">Polap makan sehat: Konsumsi makanan seimbang dan bergizi. Hindari
                                        mengandalkan makanan cepat saji atau terlalu banyak gula, karena ini dapat
                                        memengaruhi suasana hati.</li>
                                    <li class="m-3">Tidur yang cukup: Pastikan mendapatkan cukup tidur setiap malam. Pola
                                        tidur yang baik dapat memainkan peran penting dalam kesehatan mental.</li>
                                    <li class="m-3">Atur jadwal harian: Membuat jadwal harian yang terstruktur dapat
                                        membantu memberikan kerangka waktu yang jelas, mengurangi rasa kebingungan, dan
                                        memberikan tujuan harian.</li>
                                    <li class="m-3">Hindari alkohol dan obat-obatan terlarang: Alkohol dan obat-obatan
                                        terlarang dapat memperburuk gejala depresi. Jika sedang menggunakan obat resep,
                                        konsultasikan dengan dokter.</li>
                                    <li class="m-3">Praktek relaksasi dan meditasi: Teknik-teknik relaksasi, seperti
                                        meditasi dan pernapasan dalam, dapat membantu meredakan stres dan meningkatkan
                                        kesejahteraan mental.</li>
                                    <li class="m-3">Tetap terhubung: Jangan mengisolasi diri. Tetaplah terhubung dengan
                                        orang-orang di sekitar, baik melalui pertemuan langsung atau komunikasi online.</li>
                                    <li class="m-3">Mencari bantuan profesional: Jika depresi tidak membaik atau bahkan
                                        memburuk, sangat penting untuk mencari bantuan profesional. Konsultasikan dengan
                                        psikolog, psikiater, atau tenaga kesehatan mental lainnya.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- EndHandling -->

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
                                        <div class="col-4">
                                            <div class="card">
                                                <div class="card-body verdana-light">
                                                    <h6 class="text-center mb-4 mt-3">{{ $article->title }}</h6>
                                                    <div class="text-center">
                                                        <img src="{{ $article->thumbnail }}" alt="..."
                                                            class="img-fluid rounded"
                                                            style="height: 120px; width: 300px; object-fit: cover;">
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

    </div>
@endsection
