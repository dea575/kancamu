@extends('admin.layouts.app')

@section('title')
    Hasil & Penanganan
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
                                <th>Nama</th>
                                <th>Skor Minimal</th>
                                <th>Skor Maksimal</th>
                                <th>lainnya</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @foreach ($results as $key => $result)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $result->name }}</td>
                                    <td>{{ $result->min }}</td>
                                    <td>{{ $result->max }}</td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#handling-{{ $result->id }}">
                                            Lainnya
                                        </button>
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="handling-{{ $result->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Lainnya</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="">Penanganan: </label>
                                                            {!! $result->handling !!}
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Warna: </label>
                                                            <br>
                                                            <button class="btn text-white" style="background-color: {{ $result->color }}; pointer-events: none; border: 0">{{ $result->color }}</button>
                                                        </div>
                                                        @if ($result->image)
                                                        <div class="form-group">
                                                            <label for="">Gambar: </label>
                                                            <br>
                                                            <img src="{{ $result->image ?? asset('asset/no-image.svg') }}" id="previewImage" class="img-fluid" style="height: 200px;" alt="">
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="gap-2">
                                        <!-- EditModal -->
                                        <form action="{{ route('admin.result.update', $result->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal-{{ $result->id }}">
                                                <i class="nc-icon nc-settings-90"></i>
                                            </button>
                                            <div class="modal fade" id="editModal-{{ $result->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Ubah Hasil</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-3 form-group">
                                                                    <label for="name">Nama</label>
                                                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $result->name) }}">
                                                                </div>
                                                                <div class="col-3 form-group">
                                                                    <label for="min">Skor Minimal</label>
                                                                    <input type="number" name="min" min="0" class="form-control @error('min') is-invalid @enderror" value="{{ old('min', $result->min) }}">
                                                                </div>
                                                                <div class="col-3 form-group">
                                                                    <label for="max">Skor Maksimal</label>
                                                                    <input type="number" name="max" min="0" class="form-control @error('max') is-invalid @enderror" value="{{ old('max', $result->max) }}">
                                                                </div>
                                                                <div class="col-3 form-group">
                                                                    <label for="name">Warna</label>
                                                                    <input type="color" name="color" class="form-control @error('color') is-invalid @enderror" value="{{ old('color', $result->color) }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="handling">Penanganan</label>
                                                                    <textarea class="form-control" name="handling">{{ old('handling', $result->handling) }}</textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="image">Gambar <span class="text-danger">*) Opsional</span></label>
                                                                    <br>
                                                                    <img src="{{ $result->image ?? asset('asset/no-image.svg') }}" id="previewImage" class="img-fluid" style="height: 200px;" alt="">
                                                                    <input type="file" name="image" id="image" data- class="form-control mt-2 @error('image') is-invalid @enderror">
                                                                </div>
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

                                        <!-- EditModal -->
                                        <form action="{{ route('admin.result.destroy', $result->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#destroyModal-{{ $result->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <div class="modal fade" id="destroyModal-{{ $result->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Hasil</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4>Apakah anda yakin akan menghapus Hasil <i>{{ $result->name }}</i>?</h4>
                                                        </div>
                                                        <div class="modal-footer row justify-content-end">
                                                            <button type="submit" class="btn btn-danger btn-fill">Hapus</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- EndEditModal -->
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
<form action="{{ route('admin.result.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Hasil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-3 form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        </div>
                        <div class="col-3 form-group">
                            <label for="name">Skor Minimal</label>
                            <input type="number" name="min" min="0" class="form-control @error('min') is-invalid @enderror" value="{{ old('min') }}">
                        </div>
                        <div class="col-3 form-group">
                            <label for="name">Skor Maksimal</label>
                            <input type="number" name="max" min="0" class="form-control @error('max') is-invalid @enderror" value="{{ old('max') }}">
                        </div>
                        <div class="col-3 form-group">
                            <label for="name">Warna</label>
                            <input type="color" name="color" class="form-control @error('color') is-invalid @enderror" value="{{ old('color') }}">
                        </div>
                        <div class="col-12 form-group">
                            <label for="handling">Penanganan</label>
                            <textarea class="form-control" name="handling">{{ old('handling') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Gambar <span class="text-danger">*) Opsional</span></label>
                            <br>
                            <img src="{{ asset('asset/no-image.svg') }}" id="previewImage" class="img-fluid" style="height: 200px;" alt="">
                            <input type="file" name="image" id="image" data- class="form-control mt-2 @error('image') is-invalid @enderror">
                        </div>
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
        $('html, body').animate({
            scrollTop: $('#here').offset().top
        }, 1000);

        tinymce.init({
            selector: 'textarea',
            promotion: false,
            plugins: 'link lists',
            mobile: {
                menubar: true,
            }
        });

        $('#image').change(function () {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("image").files[0]);
    
            oFReader.onload = function (oFREvent) {
                document.getElementById("previewImage").src = oFREvent.target.result;
            };
        })
    })
</script>
@endpush
