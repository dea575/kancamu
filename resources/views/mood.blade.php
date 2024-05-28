@extends('layouts.app')

@section('content')
    <div style="position: relative; text-align: center;">
        <img src="{{ asset('asset/background-header.svg') }}" alt="" class="img-fluid w-100 h-100">
        <div class="textover">
            <h3 class="verdana-bold">Isi Mood mu Setiap Hari</h3>
            <img src="{{ asset('asset/logo.png') }}" class="img-fluid" style="height: 49px;" alt="">
        </div>
    </div>

    <!-- Depression -->
    <div class="row justify-content-center mt-4">
        <div class="col-7 mt-3 mb-3 text-center">
            <p class="verdana-light" style="font-size: 13px; line-height: 2.6;">
                Mood adalah istilah yang digunakan untuk mengekspresikan perasaan atau suasana hati seseorang pada waktu
                tertentu. Mencakup perasaan yang melibatkan emosi, suasana, atau keadaan mental seseorang. Mood dapat
                berkisar dari positif hingga negatif, dan dapat dipengaruhi oleh berbagai faktor seperti lingkungan,
                peristiwa, kesehatan fisik dan mental, serta faktor internal lainnya.
            </p>
        </div>
    </div>
    <!-- EndDepression -->

    <div id="here"></div>

    <!-- Mood -->
    <div class="container mt-5">
        <div class="text-center">
            <h4 class="verdana-semibold">Bagaimana mood mu hari ini?</h4>
        </div>
        <div class="row mt-5 justify-content-center align-items-center">
            <div class="col-6">
                <form action="{{ route('mood.store') }}" method="POST">
                    <div class="row text-center">
                        @csrf
                        <div class="col-4">
                            <button class="btn" name="mood" value="sad" onclick="this.form().submit">
                                <figure>
                                    <img src="{{ asset('asset/beranda/sedih.svg') }}" alt=""
                                        class="img-fluid rounded {{ $mood == 'sad' ? 'mood' : '' }}"
                                        style="width: 100px; height: 100px">
                                    <figcaption class="verdana-light mt-1">Sedih</figcaption>
                                </figure>
                            </button>
                        </div>
                        <div class="col-4">
                            <button class="btn" name="mood" value="moved" onclick="this.form().submit">
                                <figure>
                                    <img src="{{ asset('asset/beranda/terharu.svg') }}" alt=""
                                        class="img-fluid rounded {{ $mood == 'moved' ? 'mood' : '' }}"
                                        style="width: 100px; height: 100px">
                                    <figcaption class="verdana-light text-black mt-1">Terharu</figcaption>
                                </figure>
                            </button>
                        </div>
                        <div class="col-4">
                            <button class="btn" name="mood" value="disappointed" onclick="this.form().submit">
                                <figure>
                                    <img src="{{ asset('asset/beranda/kecewa.svg') }}" alt=""
                                        class="img-fluid rounded {{ $mood == 'disappointed' ? 'mood' : '' }}"
                                        style="width: 100px; height: 100px">
                                    <figcaption class="verdana-light mt-1">Kecewa</figcaption>
                                </figure>
                            </button>
                        </div>
                        <div class="col-4">
                            <button class="btn" name="mood" value="angry" onclick="this.form().submit">
                                <figure>
                                    <img src="{{ asset('asset/beranda/marah.svg') }}" alt=""
                                        class="img-fluid rounded {{ $mood == 'angry' ? 'mood' : '' }}"
                                        style="width: 100px; height: 100px">
                                    <figcaption class="verdana-light mt-1">Marah</figcaption>
                                </figure>
                            </button>
                        </div>
                        <div class="col-4">
                            <button class="btn" name="mood" value="happy" onclick="this.form().submit">
                                <figure>
                                    <img src="{{ asset('asset/beranda/senang.svg') }}" alt=""
                                        class="img-fluid rounded {{ $mood == 'happy' ? 'mood' : '' }}"
                                        style="width: 100px; height: 100px">
                                    <figcaption class="verdana-light mt-1">Senang</figcaption>
                                </figure>
                            </button>
                        </div>
                        <div class="col-4">
                            <button class="btn" name="mood" value="normal" onclick="this.form().submit">
                                <figure>
                                    <img src="{{ asset('asset/beranda/biasa.svg') }}" alt=""
                                        class="img-fluid rounded {{ $mood == 'normal' ? 'mood' : '' }}"
                                        style="width: 100px; height: 100px">
                                    <figcaption class="verdana-light mt-1">Biasa Aja</figcaption>
                                </figure>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <div id='calendar'></div>
            </div>
        </div>

        <button type="button" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#testModal" id="testButton"></button>
        <div class="modal fade" id="testModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <ul class="nav nav-pills" id="myTab" hidden>
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#menu1"></a>
                                <a class="nav-link" data-bs-toggle="tab" href="#menu2"></a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane container text-black active" id="menu1">
                                <div class="col-12 mt-3 mb-3 text-center">
                                    <p class="verdana-light" style="font-size: 13px; line-height: 2.6;">
                                        Terima kasih ya karena telah mengisi mood mu hari ini ^^ mood yang sedang kamu
                                        rasakan saat ini pasti berat ya melaluinya ?
                                    </p>
                                </div>
                                <div class="d-flex justify-content-center mt-5">
                                    <a class="btn btn-success btnNext">Next</a>
                                </div>
                            </div>
                            <div class="tab-pane container text-black" id="menu2">
                                <div class="col-12 mt-3 mb-3 text-center">
                                    <p class="verdana-light" style="font-size: 13px; line-height: 2.6;">
                                        Gapapa semua akan baik-baik aja ^^ Semua orang pernah merasa tertekan juga, tapi
                                        jangan sampai perasaan itu mengendalikanmu dirimu ya, kalau memang kamu perlu
                                        bantuan atau teman cerita kamu bisa banget bercerita ke kami ^^, tapi sebelum itu
                                        coba deh kamu ikut tes ini biar kamu tau apakah kamu deprsi atau tidak. Apakah kamu
                                        siap mengikuti tes ?
                                    </p>
                                </div>
                                <div class="d-flex justify-content-between mt-5">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                        aria-label="Close">Tidak</button>
                                    <a class="btn btn-success" href="{{ route('test.index') }}">Ya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .textover {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .mood {
            filter: grayscale(100%);
        }

        .ct-label {
            color: black;
        }

        /* Change text color of day headers in dayGridMonth view */
        .fc-daygrid-day {
        color: green; /* Change this color to your desired text color */
        text-decoration: none; /* Remove underline */
        }

        /* Change the color of day numbers */
        .fc-daygrid-day-number {
        color: black; /* Change this color to your desired text color */
        text-decoration: none; /* Remove underline */
        }

        /* Change the color of the month/year header */
        .fc-toolbar-title {
        color: black; /* Change this color to your desired text color */
        }

    </style>
@endpush

@push('js')
    <script src="{{ asset('js/fullcalendar/dist/index.global.min.js') }}" type="text/javascript"></script>
    <script type="module">
        $(document).ready(function() {
            $('html, body').animate({
                scrollTop: $('#here').offset().top
            }, 100);

            const nextBtn = document.querySelectorAll(".btnNext");
            const prevBtn = document.querySelectorAll(".btnPrev");

            nextBtn.forEach(function(item, index) {
                item.addEventListener('click', function() {
                    let id = index + 1;
                    let tabElement = document.querySelectorAll("#myTab li a")[id];
                    var lastTab = new bootstrap.Tab(tabElement);
                    lastTab.show();
                    $('html, body').animate({
                        scrollTop: $('#here').offset().top
                    }, 100);
                });

            });

            prevBtn.forEach(function(item, index) {
                item.addEventListener('click', function() {
                    let id = index;
                    let tabElement = document.querySelectorAll("#myTab li a")[id];
                    var lastTab = new bootstrap.Tab(tabElement);
                    lastTab.show();
                    $('html, body').animate({
                        scrollTop: $('#here').offset().top
                    }, 100);
                });
            });
        })

        $(document).ready(function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: {
                    url: "{{ route('mood.getMood') }}",
                    method: 'GET',
                    failure: function() {
                        alert('There was an error fetching the events!');
                    },
                }
            });

            calendar.render();
        })
    </script>

    @if (Session::get('true'))
        <script type="module">
            $(document).ready(function() {
                $('#testButton').trigger('click');
            })
        </script>
    @endif
@endpush
