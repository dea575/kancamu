@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <img src="{{ $article->thumbnail }}" class="img-fluid" alt="" style="max-height: 350px;">
                </div>
                <hr style="height:1px;border:none;color:#333;background-color:#333;">
                <div class="text-center mt-5 mb-5">
                    <h4 class="verdana-semibold mt-5">{{ $article->title }}</h4>
                </div>
                <div class="verdana-light m-4" style="font-size: 12px;">
                    {!! $article->content !!}
                </div>
            </div>
        </div>
    </div>
@endsection
