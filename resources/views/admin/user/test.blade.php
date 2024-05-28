@extends('admin.layouts.app')

@push('css')
    <style>
        .form-check-input{
            outline: 1px solid #0000;
            padding-right: 0px;
            
        }
    </style>
@endpush

@section('title')
    Pertanyaan
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover" id="here">
                    <div class="card-body table-responsive">
                        @include('admin.layouts.alerts')
                        <table class="table table-borderless">
                            <tr>
                                <td style="width: 15%"><h4>Hasil Test :</h4></td>
                                <td><h4>{{ $test->Result->name }}</h4></td>
                                <td style="width: 15%"><h4>Total Score : </h4></td>
                                <td style="width: 100%"><h4>{{ $test->score }}</h4></td>
                            </tr>
                        </table>
                    </div>
                </div>                
            </div>
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover" id="here">
                    <div class="card-body table-responsive">
                        @include('admin.layouts.alerts')
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>No</th>
                                <th>Pertanyaan</th>
                                <th>Balik Jawaban</th>
                                <th>Score</th>
                            </thead>
                            <tbody>
                                @foreach ($test->QuestionUserAnswer as $key => $question)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $question->Question->question }}</td>
                                    <td>
                                        @if ($question->Question->is_reverse)
                                            Ya <span class="text-danger">*</span>
                                        @else
                                            Tidak
                                        @endif
                                    </td>
                                    <td><b>{{ $question->answer }}</b></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="{{ asset('admin/assets/js/plugins/bootstrap-notify.js') }}" type="text/javascript"></script>
<script>
</script>
@endpush
