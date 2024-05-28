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
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>No</th>
                                <th>Nama User</th>
                                <th>Email</th>
                                <th>Nomor Whatsapp</th>
                                <th style="width: 100%">Aksi</th>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->whatsapp }}</td>
                                    <td class="gap-2">
                                        <a href="{{ route('admin.user.show', $user->id) }}" class="btn btn-info" title="Lihat User"><i class="fa fa-eye"></i></a>
                                        <!-- DestroyModal -->
                                        <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#destroyModal-{{ $user->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <div class="modal fade" id="destroyModal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Hasil</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4>Apakah anda yakin akan menghapus User : <i>{{ $user->name }}</i> ?</h4>
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
</script>
@endpush
