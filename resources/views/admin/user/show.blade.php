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
                    <div class="card-header">
                        <h4 class="card-title">Profil</h4>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-borderless">
                            <tr>
                                <td style="width: 15%;">Nama</td>
                                <td>:</td>
                                <td style="width: 100%;">{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td style="width: 15%;">Email</td>
                                <td>:</td>
                                <td style="width: 100%;">{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td style="width: 15%;">Jenis Kelamin</td>
                                <td>:</td>
                                <td style="width: 100%;">{{ $user->gender == 'male' ? 'Laki - Laki' : 'Perempuan' }}</td>
                            </tr>
                            <tr>
                                <td style="width: 15%;">Tanggal Lahir</td>
                                <td>:</td>
                                <td style="width: 100%;">{{ date('d-m-Y', strtotime($user->birthdate)) }}</td>
                            </tr>
                            <tr>
                                <td style="width: 15%;">Nomor Whatsapp</td>
                                <td>:</td>
                                <td style="width: 100%;">{{ $user->whatsapp }}</td>
                            </tr>
                        </table>
                    </div>
                </div>                
            </div>

            <div class="col-md-12">                
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header">
                        <h4 class="card-title">Mood Harian</h4>
                    </div>
                    <div class="card-body table-responsive">
                        <div class="text-center">
                            <i class="fa fa-circle" style="color: #02B4B7"></i> Sedih
                            <i class="fa fa-circle" style="color: #6669B8"></i> Terharu
                            <i class="fa fa-circle" style="color: #FF8C03"></i> Kecewa
                            <i class="fa fa-circle" style="color: #FF6346"></i> Marah
                            <i class="fa fa-circle" style="color: #5777E9"></i> Senang
                            <i class="fa fa-circle" style="color: #84D445"></i> Biasa
                        </div>
                        <div class="d-flex justify-content-center mt-5">
                            <div class="col-10" id='calendar'></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header">
                        <h4 class="card-title">Hasil Tes</h4>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Score</th>
                                <th>Hasil Tes</th>
                                <th style="width: 100%">Aksi</th>
                            </thead>
                            <tbody>
                                @foreach ($user->QuestionUser as $key => $test)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ date('d-m-Y', strtotime($test->created_at)) }}</td>
                                    <td>{{ $test->score }}</td>
                                    <td>{{ $test->Result->name }}</td>
                                    <td style="width: 100%">
                                        <a href="{{ route('admin.user.test', $test->id) }}" class="btn btn-info"><i class="nc-icon nc-notes" title="Lihat Jawaban"></i></a>
                                    </td>
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

@push('css')
<style>

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
        var calendarEl = document.getElementById('calendar');
        
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: {
                url: "{{ route('admin.user.mood', $user->id) }}",
                method: 'GET',
                failure: function() {
                    alert('There was an error fetching the events!');
                },
            }
        });

        calendar.render();
    })
</script>
@endpush
