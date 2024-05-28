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
                <div class="card" id="here">
                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <img src="{{ $article->thumbnail }}" id="previewImage" class="img-fluid" style="max-height: 200px;" alt="">                                
                        </div>
                        <div class="text-center">
                            <h3>{{ $article->title }}</h3>
                        </div>
                        <hr style="height:1px;border:none;color:#333;background-color:#333;">
                        <div class="content mt-4">
                            {!! $article->content !!}
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="{{ asset('admin/js/tinymce/tinymce.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/js/plugins/bootstrap-notify.js') }}" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        $('html, body').animate({
            scrollTop: $('#here').offset().top
        }, 1000);

        $('#thumbnail').change(function () {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("thumbnail").files[0]);
    
            oFReader.onload = function (oFREvent) {
                document.getElementById("previewImage").src = oFREvent.target.result;
            };
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
