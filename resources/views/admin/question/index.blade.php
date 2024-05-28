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
                        <button type="button" class="btn btn-success pull-right mb-4" data-toggle="modal" data-target="#addModal">
                            Tambah
                        </button>
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>No</th>
                                <th>Pertanyaan</th>
                                <th>Balik Skor Jawaban</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @foreach ($questions as $key => $question)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $question->question }}</td>
                                    <td>{{ $question->is_reverse == 0 ? 'Tidak' : 'Ya' }}</td>
                                    <td class="gap-2">
                                        <!-- EditModal -->
                                        <form action="{{ route('admin.question.update', $question->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal-{{ $question->id }}">
                                                <i class="nc-icon nc-settings-90"></i>
                                            </button>
                                            <div class="modal fade" id="editModal-{{ $question->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Ubah Hasil</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="question">Pertanyaan</label>
                                                                <textarea class="form-control @error('question') is-invalid @enderror" rows="3" name="question">{{ old('question', $question->question) }}</textarea>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="checkbox" name="is_reverse" id="is_reverse-{{ $question->id }}" class="form-check-input @error('is_reverse') is-invalid @enderror" value="1" {{ $question->is_reverse ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="is_reverse-{{ $question->id }}">Balik Skor Jawaban</label>
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
                                        <form action="{{ route('admin.question.destroy', $question->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#destroyModal-{{ $question->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <div class="modal fade" id="destroyModal-{{ $question->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Hasil</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4>Apakah anda yakin akan menghapus Pertanyaan : <i>{{ $question->question }}</i>?</h4>
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
<form action="{{ route('admin.question.store') }}" method="POST">
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
                        <label for="question">Pertanyaan</label>
                        <textarea class="form-control @error('question') is-invalid @enderror" rows="3" name="question">{{ old('question') }}</textarea>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="is_reverse" id="is_reverse-0" class="form-check-input @error('is_reverse') is-invalid @enderror" value="1">
                        <label class="form-check-label" for="is_reverse-0">Balik Skor Jawaban</label>
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
<script src="{{ asset('admin/assets/js/plugins/bootstrap-notify.js') }}" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        $('html, body').animate({
            scrollTop: $('#here').offset().top
        }, 1000);
    })
</script>
@endpush
