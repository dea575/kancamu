@extends('layouts.app')
@push('css')
    <style>
        .textover {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .form-check-input {
            border-color: #7B1FA2;
            outline: 1px solid #000000
        }
    </style>
@endpush
@section('content')
    <div style="position: relative; text-align: center;">
        <img src="{{ asset('asset/background-header.svg') }}" alt="" class="img-fluid w-100 h-100">
        <div class="textover">
            <h3 class="verdana-bold">Hasil Tes yang diperoleh</h3>
            <img src="{{ asset('asset/logo.png') }}" class="img-fluid" style="height: 49px;" alt="">
        </div>
    </div>

    <!-- Result -->
    <div class="row justify-content-center mt-4">
        <div class="col-11" id="here">
            <div class="card mt-4" style="background-color: #EBF2FA; border-radius: 15px; border: none;">
                <div class="card-body m-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-8 align-items-center">
                                <div class="d-flex justify-content-center mb-5">
                                    <h3 class="verdana-bold">Hasil Perhitungan {{ $test->score }}</h3>
                                </div>
                                <div class="d-flex justify-content-center mb-5">
                                    <h4 class="verdana-regular">Kamu Mengalami &nbsp;</h4>
                                    <h4 class="verdana-bold" style="color: {{ $test->Result->color }}">{{ $test->Result->name }}</h4>
                                </div>
                                <div class="verdana-light">
                                    {!! $test->Result->handling !!}
                                </div>
                            </div>
                            <div class="col-4 align-items-center">
                                <img src="{{ $test->Result->image ? $test->Result->image : asset('asset/hasil diagnosa.png') }}" class="img-fluid" style="height: 340px;" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- EndResult -->

    <!-- Indicator -->
    <div class="row justify-content-center mt-4">
        <div class="col-4" id="here">
            <div class="card mt-4 shadow" style="border-radius: 15px; border: none;">
                <div class="card-body m-4">
                    <div class="container">
                        <div class="row">
                            <div class="d-flex justify-content-center mb-3">
                                <h6 class="verdana-bold">Indikator Penilaian</h6>
                            </div>
                            <div class="verdana-light text-center" style="line-height: 2.6;">
                                <p>0 - 9 : Tidak depresi / Gangguan mood</p>
                                <p>10 - 15 : Depresi ringan</p>
                                <p>16 - 24 : Depresi sedang</p>
                                <p>≥ 25 : Depresi berat</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- EndIndicator -->

    <!-- Depression -->
    <div class="row justify-content-center mt-4">
        <div class="col-5 mt-3 text-center">
            <p class="verdana-light mb-3" style="font-size: 17px; line-height: 2.6;">
                Terima kasih ya karena kamu telah mengikuti tes ini. Jika membutuhkan bantuan kami bisa banget menghubungi
                melalui Whatsapp ya
            </p>
            <a href="https://wa.me/6282228679118" target="_blank"><img src="{{ asset('asset/footer/whatsapp.png') }}" alt="" class="img-fluid" style="max-width: 40px; max-height: 40px;"></a>
            <br>
            <a href="{{ route('test.print', $test->id) }}" class="btn btn-success mt-4" target="_blank">Klik disini untuk print hasil tes</a>
        </div>
    </div>
    <!-- EndDepression -->
@endsection

@push('js')
    <script type="module">
        $(document).ready(function() {});
    </script>
@endpush
