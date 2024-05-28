@extends('admin.layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">Selamat Datang {{ Auth::user()->name }}</h4>
                        <p class="card-category">Dashboard</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">Presentase Hasil Test User</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-around">
                            <div class="col-6">
                                <input type="month" class="form-control" id="month" value="{{ date('Y-m') }}">
                            </div>
                            <div class="col-6">
                                <select class="form-select" id="gender">
                                    <option value="" selected>Semua Jenis Kelamin</option>
                                    <option value="male">Laki - laki</option>
                                    <option value="female">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div id="result" class="ct-chart ct-perfect-fourth"></div>
                        <div class="d-flex justify-content-center gap-4">
                            @foreach ($results as $key => $datas)
                                <div class="legend">
                                    @foreach ($datas as $result)
                                    <div>
                                        <i class="fa fa-circle" style="color: {{ $result->color }}"></i> {{ $result->name }}
                                    </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">Presentase Mood User</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-around">
                            <div class="col-6">
                                <input type="month" class="form-control" id="month-mood" value="{{ date('Y-m') }}">
                            </div>
                            <div class="col-6">
                                <select class="form-select" id="gender-mood">
                                    <option value="" selected>Semua Jenis Kelamin</option>
                                    <option value="male">Laki - laki</option>
                                    <option value="female">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div id="mood" class="ct-chart ct-perfect-fourth"></div>
                        <div class="d-flex justify-content-center gap-4">
                            <div class="legend">
                                <div>
                                    <i class="fa fa-circle" style="color: #02B4B7"></i> Sedih
                                </div>
                                <div>
                                    <i class="fa fa-circle" style="color: #6669B8"></i> Terharu
                                </div>
                            </div>
                            <div class="legend">
                                <div>
                                    <i class="fa fa-circle" style="color: #FF8C03"></i> Kecewa
                                </div>
                                <div>
                                    <i class="fa fa-circle" style="color: #FF6346"></i> Marah
                                </div>
                            </div>
                            <div class="legend">
                                <div>
                                    <i class="fa fa-circle" style="color: #5777E9"></i> Senang
                                </div>
                                <div>
                                    <i class="fa fa-circle" style="color: #84D445"></i> Biasa
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
@foreach ($resultDatas as $key => $resultData)
    @foreach (range('a', 'o') as $item => $data)
        @if ($key == $item)
            <style>
                .ct-series-{{ $data }} .ct-slice-pie {
                    fill: {{ $resultData->color }};
                }
            </style>

        @endif
    @endforeach
@endforeach
@endpush

@push('js')
<script src="{{ asset('admin/assets/js/plugins/chartist.min.js') }}" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        function getResult() {
            $.ajax({
                type: "GET",
                url: "{{ route('admin.get-result') }}",
                data : {
                    'month' : $('#month').val(),
                    'gender' : $('#gender').val(),
                },
                success: function(data) {
                    console.log(data);

                    var chart = new Chartist.Pie('#result', data);

                    chart.update(data);

                }
            });
        }
        getResult();

        function getMood() {
            $.ajax({
                type: "GET",
                url: "{{ route('admin.get-mood') }}",
                dataType: 'json',
                data : {
                    'month' : $('#month-mood').val(),
                    'gender' : $('#gender-mood').val(),
                },
                success: function(data) {
                    console.log(data);

                    var chart = new Chartist.Pie('#mood', data);

                    chart.update(data);

                    // Custom styles for the pie chart slices
                    var style = document.createElement('style');
                    style.type = 'text/css';
                    style.innerHTML = `
                        .chartpie-mood-0 { fill: #02B4B7; }
                        .chartpie-mood-1 { fill: #6669B8; }
                        .chartpie-mood-2 { fill: #FF8C03; }
                        .chartpie-mood-3 { fill: #FF6346; }
                        .chartpie-mood-4 { fill: #5777E9; }
                        .chartpie-mood-5 { fill: #84D445; }
                    `;
                    document.getElementsByTagName('head')[0].appendChild(style);
                }
            });
        }
        getMood();

        $('#month').change(function(){
            getResult();
        });

        $('#month-mood').change(function(){
            getMood();
        });

        $('#gender').change(function(){
            getResult();
        });

        $('#gender-mood').change(function(){
            getMood();
        });
    })
</script>
@endpush
