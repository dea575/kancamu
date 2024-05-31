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
            top: 65%;
            left: 60%;
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
            align-self: center;
            border: none !important
        }

        @media (max-width: 768px) {
            .textleft, .textright {
                position: static;
                transform: none;
                text-align: center;
            }

            .textright img {
                height: 250px;
            }
        }
    </style>
@endpush

@section('content')
    <div class="position-relative text-center">
        <img src="{{ asset('asset/background-header.svg') }}" alt="" class="img-fluid w-100">
        <div class="textleft">
            <h3 class="verdana-bold">Tentang Kami</h3>
            <img src="{{ asset('asset/logo.png') }}" class="img-fluid" style="height: 49px;" alt="">
        </div>
        <div class="textright">
            <img src="{{ asset('asset/tentang kami.png') }}" class="img-fluid" style="height: 450px;" alt="">
        </div>
    </div>
    <div class="container mt-2">
        <!-- Sejarah -->
        <div class="row justify-content-center">
            <div class="text-center mt-5 mb-4">
                <h4 class="verdana-semibold">Sejarah</h4>
            </div>
            <div class="col-12 col-md-9 mt-3 mb-3 text-center">
                <p class="verdana-light" style="font-size: 15px; line-height: 2.6;">
                    Biro Psikologi Kancamu didirikan pada 26 Juni 2022 oleh Kokoh D. Putera, M.Psi., Psikolog bersama
                    dengan dua rekannya yakni Ibnu Sutoko, M.Psi., Psikolog dan Eka Nur Maulida, M.Psi., Psikolog.
                    Selama 1 tahun berjalan, Kancamu sudah berkolaborasi dengan para praktisi psikologi
                    maupun non psikologi, serta akademisi dari beberapa perguruan tinggi. Pada 25 Agustus 2023, Kancamu telah terdaftar
                    dalam Sistem Administrasi Badan Usaha dengan nama CV Potensi Sumber Daya Maju (PSDM) dan
                    disusul dengan terbitnya Nomor Induk Berusaha pada 5 September 2023. Langkah besar ini diambil
                    sebagai upaya untuk meningkatkan bargaining position dan kredibilitas perusahaan dalam memasuki tahun ke-2.
                </p>
            </div>
        </div>

        <!-- Visi & Misi -->
        <div class="row mt-5">
            <div class="col-lg-4 d-flex align-items-stretch">
                <div class="card mb-4" style="background-color: #EBF2FA; border: none;">
                    <div class="card topcard text-white text-center mb-3" style="background-color: #4E5170; width: 200px;">
                        <div class="card-body">VISI</div>
                    </div>
                    <div class="card-body d-flex justify-content-center">
                        <div class="text-center" style="font-size: 15px; line-height: 1.8;">
                            Menjadi salah satu institusi yang turut berkontribusi mewujudkan Indonesia Maju melalui upaya peningkatan kesejahteraan psikologis masyarakat, kualitas pendidikan, serta pengembangan organisasi dan sumberdaya manusia di Indonesia.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 d-flex align-items-stretch">
                <div class="card mb-4" style="background-color: #EBF2FA; border: none;">
                    <div class="card topcard text-white text-center mb-3" style="background-color: #4E5170; width: 200px;">
                        <div class="card-body">MISI</div>
                    </div>
                    <div class="card-body d-flex justify-content-center">
                        <div style="font-size: 15px;">
                            <ol>
                                <li class="mb-3">Mencetak kader-kader yang siap memperluas jangkauan promosi dan edukasi terkait kesehatan mental dan pendidikan berbasis psikologi perkembangan.</li>
                                <li class="mb-3">Bekerja sama dengan berbagai institusi, baik pemerintahan, swasta maupun swadaya masyarakat untuk mencegah serta memberikan tindakan yang efektif dan efisien terhadap berbagai masalah multidimensi di sektor klinis, pendidikan, dan industri.</li>
                                <li class="mb-3">Membantu para klien dalam menumbuhkan kesadaran atas potensi yang dimiliki dan meningkatkan kapasitas personal maupun interpersonal.</li>
                                <li class="mb-3">Melakukan aktivitas pengabdian maupun pemberdayaan terhadap kelompok masyarakat yang membutuhkan.</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Psikolog -->
        <div class="mt-5 mb-5">
            <div class="row justify-content-center pb-5">
                <div class="card verdana-light text-white text-center mb-3" style="background-color: #4E5170; width: 200px;">
                    <div class="card-body">Psikolog</div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="row gap-3 d-flex justify-content-around">
                        @foreach ($psychologists as $psychologist)
                            <div class="col-md-5">
                                <div class="card shadow mb-4">
                                    <div class="card-body align-items-center m-2 row">
                                        <div class="col-3">
                                            <img src="{{ $psychologist->photo }}" alt="" class="object-fit-cover border rounded-circle" style="width: 55px; height: 55px">
                                        </div>
                                        <div class="col-9 text-left">
                                            <h6 class="verdana-semibold">{{ $psychologist->name }}</h6>
                                            <a href="#detailpsy-{{ $psychologist->id }}" class="stretched-link" data-bs-toggle="modal" data-bs-target="#detailpsy-{{ $psychologist->id }}"></a>
                                            <div class="modal fade" id="detailpsy-{{ $psychologist->id }}" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5">Detail Psikolog</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row m-3 mb-5">
                                                                <div class="col-md-5 text-center">
                                                                    <h3>Profile Psikolog</h3>
                                                                    <img src="{{ $psychologist->photo }}" class="rounded mb-4" style="width: 135px; height: 135px;">
                                                                    <div class="text-start verdana-light">
                                                                        <h6>{{ $psychologist->name }}</h6>
                                                                        <p style="font-size: 12px;">STR: {{ $psychologist->str }}</p>
                                                                        <p style="font-size: 12px;">SIPP: {{ $psychologist->sipp }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-7">
                                                                    <div class="mb-3">
                                                                        <h4>Spesialisasi Kasus</h4>
                                                                        {!! $psychologist->description !!}
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <h4>Pengalaman Praktik</h4>
                                                                        {!! $psychologist->experience !!}
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <h4>Riwayat Pendidikan</h4>
                                                                        {!! $psychologist->education !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4 text-center">
                    <img src="{{ asset('asset/doctor.svg') }}" alt="" class="img-fluid" style="height: 350px;">
                </div>
            </div>
        </div>

        <!-- Handling -->
        <div class="row justify-content-around mt-4">
            <div class="col-12">
                <div class="card shadow mt-4 text-center" style="background-color: #EBF2FA">
                    <div class="card-body m-5">
                        <div class="row justify-content-around">
                            <div class="col-lg-4 mb-4">
                                <div class="card text-center mb-4" style="background-color: #4E5170">
                                    <div class="card-body text-white">
                                        <h6 class="verdana-semibold" style="line-height: 2.0;">Layanan Penanganan Masalah Psikologis</h6>
                                    </div>
                                </div>
                                <div class="card-body text-start">
                                    <ol class="m-3" style="line-height: 1.8">
                                        <li><p class="verdana-light" style="font-size: 14px;">Assesmen non tes</p></li>
                                        <li><p class="verdana-light" style="font-size: 14px;">Assesmen dengan tes</p></li>
                                        <li><p class="verdana-light" style="font-size: 14px;">Konseling individu</p></li>
                                        <li><p class="verdana-light" style="font-size: 14px;">Konseling keluarga</p></li>
                                        <li><p class="verdana-light" style="font-size: 14px;">Psikoterapi individu</p></li>
                                    </ol>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-4">
                                <div class="card text-center mb-4" style="background-color: #4E5170">
                                    <div class="card-body text-white">
                                        <h6 class="verdana-semibold" style="line-height: 2.0;">Layanan Psikologi di Dunia Pendidikan</h6>
                                    </div>
                                </div>
                                <div class="card-body text-start">
                                    <ol class="m-3" style="line-height: 1.8">
                                        <li><p class="verdana-light" style="font-size: 13px;">Konsultasi perkembangan siswa</p></li>
                                        <li><p class="verdana-light" style="font-size: 13px;">Tes untuk siswa</p></li>
                                        <li><p class="verdana-light" style="font-size: 13px;">Edukasi parenting</p></li>
                                        <li><p class="verdana-light" style="font-size: 13px;">Training indoor/outdoor</p></li>
                                        <li><p class="verdana-light" style="font-size: 13px;">Program SESMA (Sekolah Sehat Mental)</li>
                                    </ol>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-4">
                                <div class="card text-center mb-4" style="background-color: #4E5170">
                                    <div class="card-body text-white">
                                        <h6 class="verdana-semibold" style="line-height: 2.0;">Layanan Psikologi di Dunia Pekerjaan</h6>
                                    </div>
                                </div>
                                <div class="card-body text-start">
                                    <ol class="m-3" style="line-height: 1.8">
                                        <li><p class="verdana-light" style="font-size: 13px;">Rekrutmen dan seleksi calon karyawan</p></li>
                                        <li><p class="verdana-light" style="font-size: 13px;">Profiling karyawan dan manager</p></li>
                                        <li><p class="verdana-light" style="font-size: 13px;">Analisis kebutuhan SDM dan organisasi</p></li>
                                        <li><p class="verdana-light" style="font-size: 13px;">Training indoor/outdoor</p></li>
                                        <li><p class="verdana-light" style="font-size: 13px;">Coaching</p></li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
