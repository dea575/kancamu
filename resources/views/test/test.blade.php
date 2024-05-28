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
            <h3 class="verdana-bold">Mulai Tes dengan kami</h3>
            <img src="{{ asset('asset/logo.png') }}" class="img-fluid" style="height: 49px;" alt="">
        </div>
    </div>

    <!-- Depression -->
    <div class="row justify-content-center mt-4">
        <div class="col-5 mt-3 mb-3 text-center">
            <p class="verdana-light" style="font-size: 13px; line-height: 2.6;">
                Bacalah masing-masing kalimat di bawah ini, pilihlah jawaban yang tepat yang sesuai dengan apa yang Anda
                rasakan saat ini. Tidak ada jawaban benar atau salah. Kerjakan dengan cepat dan sesegera mungkin, dengan
                memilih jawaban yang paling menggambarkan perasaan Anda saat ini.
            </p>
        </div>
    </div>
    <!-- EndDepression -->

    <!-- Test -->
    <div class="row justify-content-center mt-4">
        <div class="col-10" id="here">
            <div class="card mt-4" style="background-color: #EBF2FA; border-radius: 15px; border: none;">
                <div class="card-body m-4">
                    <div class="container">
                        @if (Session::has('msg'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('msg') }}
                            </div>
                        @endif
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills" id="myTab" hidden>
                            @foreach ($questions as $key => $item)
                                <li class="nav-item">
                                    <a class="nav-link {{ $key === 0 ? 'active' : '' }}" data-bs-toggle="tab" href="#menu{{ $key }}"></a>
                                </li>
                            @endforeach
                        </ul>

                        <!-- Tab panes -->
                        <?php $no = 0; ?>
                        <form action="{{ route('test.store') }}" method="POST">
                            @csrf
                            <div class="tab-content" id="myTabContent">
                                @if ($questions)
                                    @foreach ($questions as $key => $datas)
                                        <div class="tab-pane container text-black {{ $key === 0 ? 'active' : 'fade' }}" id="menu{{ $key }}">
                                            @foreach ($datas as $item => $question)
                                                <div class="form-group verdana-light m-3 question">
                                                    <label class="col-form-label verdana-bold">{{ $no += 1 }}. {{ $question->question }} @if($question->is_reverse) <span class="text-danger">*</span>@endif</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="question_id[{{ $question->id }}][score]" value="{{ $question->is_reverse == 0 ? 0 : 3 }}" id="never-{{ $question->id }}" onChange="$('#answer-never-{{ $question->id }}').prop('checked', true);" required>
                                                        <input type="radio" name="question_id[{{ $question->id }}][answer]" value="a" id="answer-never-{{ $question->id }}" hidden>
                                                        <label class="form-check-label" for="never-{{ $question->id }}" style="font-size: 12px">Tidak Pernah</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="question_id[{{ $question->id }}][score]" value="{{ $question->is_reverse == 0 ? 1 : 3 }}" id="rarely-{{ $question->id }}"  onChange="$('#answer-rarely-{{ $question->id }}').prop('checked', true);" required>
                                                        <input type="radio" name="question_id[{{ $question->id }}][answer]" value="b" id="answer-rarely-{{ $question->id }}" hidden>
                                                        <label class="form-check-label" for="rarely-{{ $question->id }}" style="font-size: 12px">Jarang</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="question_id[{{ $question->id }}][score]" value="{{ $question->is_reverse == 0 ? 2 : 2 }}" id="sometimes-{{ $question->id }}" onChange="$('#answer-sometimes-{{ $question->id }}').prop('checked', true);" required>
                                                        <input type="radio" name="question_id[{{ $question->id }}][answer]" value="c" id="answer-sometimes-{{ $question->id }}" hidden>
                                                        <label class="form-check-label" for="sometimes-{{ $question->id }}" style="font-size: 12px">Kadang - kadang</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="question_id[{{ $question->id }}][score]" value="{{ $question->is_reverse == 0 ? 3 : 1 }}" id="often-{{ $question->id }}" onChange="$('#answer-often-{{ $question->id }}').prop('checked', true);" required>
                                                        <input type="radio" name="question_id[{{ $question->id }}][answer]" value="d" id="answer-often-{{ $question->id }}" hidden>
                                                        <label class="form-check-label" for="often-{{ $question->id }}" style="font-size: 12px">Sering</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="question_id[{{ $question->id }}][score]" value="{{ $question->is_reverse == 0 ? 3 : 0 }}" id="frequently-{{ $question->id }}" onChange="$('#answer-frequently-{{ $question->id }}').prop('checked', true);" required>
                                                        <input type="radio" name="question_id[{{ $question->id }}][answer]" value="e" id="answer-frequently-{{ $question->id }}" hidden>
                                                        <label class="form-check-label" for="frequently-{{ $question->id }}" style="font-size: 12px">Sangat Sering</label>
                                                    </div>
                                                    <span class="text-danger not-answer" style="display: none;">(Jawaban belum dipilih!)</span>
                                                </div>
                                            @endforeach

                                            <div class="d-flex justify-content-{{ $key > 0 ? 'between' : 'end' }} mt-5">
                                                @if ($key > 0)
                                                    <a class="btn btn-info rounded-pill btnPrev">Kembali</a>
                                                @endif
                                                @if ($key < $num)
                                                    <a class="btn btn-info rounded-pill btnNext">Selanjutnya</a>
                                                @else
                                                    <!-- Button trigger modal -->
                                                    <button type="button" id="submit" class="btn btn-info rounded-pill" data-id="{{ $key }}">
                                                        Kirim
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="btn-close pull-right" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body verdana-light text-center">
                                                                    Apakah anda yakin ingin mengirim test?
                                                                </div>
                                                                <div class="d-flex justify-content-center mb-5">
                                                                    <button type="submit" class="btn btn-success">Kirim</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <h3 class="text-center verdana-regular">Belum Ada Pertanyaan!</h3>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- EndTest -->
@endsection

@push('js')
    <script type="module">
        $(document).ready(function() {
            const nextBtn = document.querySelectorAll(".btnNext");
            const prevBtn = document.querySelectorAll(".btnPrev");

            nextBtn.forEach(function(item, index) {
                item.addEventListener('click', function() {
                    var total = $('#menu'+index).find('.question').length;
                    var checked = $('#menu'+index).find('.fill').length;
                    $('#menu'+index).find('.not-answer').hide()

                    if (total != checked) {
                        var unchecked = $('#menu'+index).find('.question:not(.fill)').find('.not-answer').show()
                    } else {
                        let id = index + 1;
                        let tabElement = document.querySelectorAll("#myTab li a")[id];
                        var lastTab = new bootstrap.Tab(tabElement);
                        lastTab.show();
                    }
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

            $('.question').on('input', function() {
                $(this).addClass('fill')
            })

            $('#submit').click(function() {
                var total = $('#menu' + $(this).attr('data-id')).find('.question').length;
                var checked = $('#menu' + $(this).attr('data-id')).find('.fill').length;
                if (total != checked) {
                    var unchecked = $('#menu' + $(this).attr('data-id')).find('.question:not(.fill)').find('.not-answer').show()
                } else {
                    var myModal = document.getElementById("confirmModal");
                    var modal = new bootstrap.Modal(myModal);
                    modal.show();
                }
            })

        });
    </script>
@endpush
