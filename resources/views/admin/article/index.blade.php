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
    Artikel
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover" id="here">
                    <div class="card-body table-responsive">
                        @include('admin.layouts.alerts')
                        <a href="{{ route('admin.article.create') }}" class="btn btn-success pull-right mb-4">
                            Tambah
                        </a>
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Section</th>
                                <th>Detail</th>
                                <th class="w-100">Aksi</th>
                            </thead>
                            <tbody>
                                @foreach ($articles as $key => $article)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $article->title }}</td>
                                    <td>
                                        @switch($article->section)
                                            @case('all')
                                                Semua Section
                                                @break
                                            @case('dashboard')
                                                Beranda
                                                @break
                                            @case('depression')
                                                Depresi
                                                @break
                                            @default
                                                -
                                        @endswitch
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.article.show', $article->id) }}" class="btn btn-primary" target="__blank">Lihat Artikel</a>
                                    </td>
                                    <td class="gap-2 w-100">
                                        <a href="{{ route('admin.article.edit', $article->id) }}" class="btn btn-warning"><i class="nc-icon nc-settings-90"></i></a>
                                        <!-- DestroyModal -->
                                        <form action="{{ route('admin.article.destroy', $article->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#destroyModal-{{ $article->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <div class="modal fade" id="destroyModal-{{ $article->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Hasil</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4>Apakah anda yakin akan menghapus Artikel <i>{{ $article->title }}</i>?</h4>
                                                        </div>
                                                        <div class="modal-footer row justify-content-end">
                                                            <button type="submit" class="btn btn-danger btn-fill">Hapus</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- EndDestroyModal -->
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

@push('js')
<script src="{{ asset('admin/assets/js/plugins/bootstrap-notify.js') }}" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        $('html, body').animate({
            scrollTop: $('#here').offset().top
        }, 1000);

        $('#photo').change(function () {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("photo").files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById("previewImage").src = oFREvent.target.result;
            };
        })

        $('.photo').change(function () {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("photo").files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById("previewImage").src = oFREvent.target.result;
            };
        })
    })
</script>
@endpush
