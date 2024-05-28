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
    Psikolog
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover" id="here">
                    <div class="card-body table-responsive">
                        @include('admin.layouts.alerts')
                        <button type="button" class="btn btn-success pull-right mb-4" data-toggle="modal" data-target="#addModal">
                            Tambah
                        </button>
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>No</th>
                                <th>Nama Psikolog</th>
                                <th>STR</th>
                                <th>Foto</th>
                                <th style="width: 100%">Aksi</th>
                            </thead>
                            <tbody>
                                @foreach ($psychologists as $key => $psychologist)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $psychologist->name }}</td>
                                    <td>{{ $psychologist->str }}</td>
                                    <td>
                                        <img src="{{ $psychologist->photo }}" class="img-fluid" style="height: 100px;" alt="">
                                    </td>
                                    <td class="gap-2">
                                        <!-- DetailModal -->
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#detailModal-{{ $psychologist->id }}">
                                            <i class="nc-icon nc-single-02"></i>
                                        </button>
                                        <div class="modal fade" id="detailModal-{{ $psychologist->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Detail Psikolog</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div>
                                                            <table>
                                                                <tr>
                                                                    <td>Nama</td>
                                                                    <td>: {{ $psychologist->name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>STR</td>
                                                                    <td>: {{ $psychologist->str }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>SIPP</td>
                                                                    <td>: {{ $psychologist->sipp }}</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <div>
                                                            <h4>Tentang Psikolog</h4>
                                                            {!! $psychologist->description !!}
                                                        </div>
                                                        <div>
                                                            <h4>Pengalaman Praktik</h4>
                                                            {!! $psychologist->experience !!}
                                                        </div>
                                                        <div>
                                                            <h4>Riwayat Pendidikan</h4>
                                                            {!! $psychologist->education !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- DetailModal -->

                                        <!-- EditModal -->
                                        <form action="{{ route('admin.psychologist.update', $psychologist->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal-{{ $psychologist->id }}">
                                                <i class="nc-icon nc-settings-90"></i>
                                            </button>
                                            <div class="modal fade" id="editModal-{{ $psychologist->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Ubah Psikolog</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="name">Nama</label>
                                                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $psychologist->name) }}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="str">STR</label>
                                                                <input type="number" name="str" id="str" class="form-control @error('str') is-invalid @enderror" value="{{ old('str', $psychologist->str) }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="sipp">SIPP</label>
                                                                <input type="number" name="sipp" id="sipp" class="form-control @error('sipp') is-invalid @enderror" value="{{ old('sipp', $psychologist->sipp) }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="description">Tentang Psikolog</label>
                                                                <textarea class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description', $psychologist->description) }}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="experience">Pengalaman Praktik</label>
                                                                <textarea class="form-control @error('experience') is-invalid @enderror" name="experience">{{ old('experience', $psychologist->experience) }}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="education">Riwayat Pendidikan</label>
                                                                <textarea class="form-control @error('education') is-invalid @enderror" name="education">{{ old('education', $psychologist->education) }}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="photo">Foto</label>
                                                                <br>
                                                                <img src="{{ $psychologist->photo }}" id="previewImage-{{ $psychologist->id }}" class="img-fluid" style="height: 200px;" alt="">
                                                                <input type="file" name="photo" id="photo-{{ $psychologist->id }}" data-id="{{ $psychologist->id }}" class="form-control mt-2 photo @error('photo') is-invalid @enderror">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer row justify-content-end">
                                                            <button type="submit" class="btn btn-warning btn-fill">Ubah</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- EndEditModal -->

                                        <!-- DeleteModal -->
                                        <form action="{{ route('admin.psychologist.destroy', $psychologist->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#destroyModal-{{ $psychologist->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <div class="modal fade" id="destroyModal-{{ $psychologist->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Psikolog</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4>Apakah anda yakin akan menghapus Psikolog : <i>{{ $psychologist->name }}</i>?</h4>
                                                        </div>
                                                        <div class="modal-footer row justify-content-end">
                                                            <button type="submit" class="btn btn-danger btn-fill">Hapus</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- EndDEleteModal -->
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

<!-- AddModal -->
<form action="{{ route('admin.psychologist.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pertanyaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="str">STR</label>
                        <input type="number" name="str" id="str" class="form-control @error('str') is-invalid @enderror" value="{{ old('str') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="sipp">SIPP</label>
                        <input type="number" name="sipp" id="sipp" class="form-control @error('sipp') is-invalid @enderror" value="{{ old('sipp') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Tentang Psikolog</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="experience">Pengalaman Praktik</label>
                        <textarea class="form-control @error('experience') is-invalid @enderror" name="experience">{{ old('experience') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="education">Riwayat Pendidikan</label>
                        <textarea class="form-control @error('education') is-invalid @enderror" name="education">{{ old('education') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="photo">Foto</label>
                        <br>
                        <img src="{{ asset('asset/no-image.svg') }}" id="previewImage" class="img-fluid" style="height: 200px;" alt="">
                        <input type="file" name="photo" id="photo" data- class="form-control mt-2 @error('photo') is-invalid @enderror">
                    </div>
                </div>
                <div class="modal-footer row justify-content-end">
                    <button type="submit" class="btn btn-success btn-fill">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
    <!-- EndAddModal -->
@endsection

@push('js')
<script src="{{ asset('admin/js/tinymce/tinymce.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/js/plugins/bootstrap-notify.js') }}" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        $('#photo').change(function () {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("photo").files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById("previewImage").src = oFREvent.target.result;
            };
        })

        var data = {!! $psychologists !!}

        $.each(data, function (key, value) {
            $('#photo-'+value.id).change(function () {
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("photo-"+value.id).files[0]);

                oFReader.onload = function (oFREvent) {
                    document.getElementById("previewImage-"+value.id).src = oFREvent.target.result;
                };
            })
        })

        tinymce.init({
            selector: 'textarea',
            promotion: false,
            plugins: 'link lists',
            mobile: {
                menubar: true,
            }
        });
    })
</script>
@endpush
