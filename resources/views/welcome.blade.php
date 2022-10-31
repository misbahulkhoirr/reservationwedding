@extends('layout.app')

@section('content')
<div class="container" style="margin-top: 100px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-center mb-3">
                    <img src="assets/img/logo.png" width="200" alt="">
            </div>
            <p class="text-center">Mari wujudkan pernikahan impianmu bersama kami</p>
            <div class="d-flex justify-content-evenly mt-5">
                <a class="btn btn-primary" href="{{ url('register') }}" role="button">Daftar</a>
                <a class="btn btn-primary" href="{{ url('login') }}" role="button">Masuk</a>
            </div>
        </div>
    </div>
</div>
@endsection
