@extends('layout.app')

@section('content')

<div class="container" style="margin-top:20%;">
    <div class="d-flex justify-content-center mb-3">
        <img src="assets/img/logo.png" width="200" alt="">
    </div>
    @if(auth()->user()->role_id == 2)
    <div class="row">
        <div class="d-flex justify-content-center align-items-center">
            <h5>Hallo, {{ auth()->user()->name }} ! selamat datang di Sistem Reservation Iyus Make Up</h5>
        </div>
    </div>
    <div class="d-flex">
        <a class="btn btn-info text-white" style="margin-top:10%;" href="/riwayat_transaksi_user">Riwayat Pemesanan</a>
        <a class="text-white iconClass bg-info" style="margin-top:10%; margin-left:10px;padding:5px 20px; border-radius:5px " href="/cart"><i class="fa-solid fa-cart-shopping"></i>@if($cart->count() !=0) <span class="badge">{{$cart->count()}} @endif</span></a>
    </div>

    @endif

    @if(auth()->user()->role_id == 1)
    <div class="row">
        <div class="d-flex justify-content-center align-items-center">
            <h5>Hallo, {{ auth()->user()->name }} ! selamat datang di Sistem Reservation Iyus Make Up</h5>
        </div>
    </div>
    <div class="mt-5">
        
        <a class="bg-info text-white iconClass text-decoration-none" style=" margin-left:10px;padding:10px 20px; border-radius:5px" href="/riwayat_transaksi_admin">Riwayat Pemesanan @if($transaksi->count() !=0) <span class="badge">{{$transaksi->count()}} @endif</span> </a>
    </div>
   
    @endif
</div>
@endsection
