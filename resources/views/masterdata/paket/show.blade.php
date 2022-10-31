@extends('layout.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ $title }}</div>
            <div class="card-body">
                @if ($paket->gambar)
                <img src="{{ asset('storage/'.$paket->gambar) }}" class="card-img-top" height="500" alt="...">
                @else
                <img src="{{('assets/img/placeholder.png')}}" class="card-img-top" width="200" height="200" alt="...">
                @endif
                <div class="text-center mt-3">
                    <h2>{{$paket->name}}</h2>
                    <h3>Rp. {{number_format($paket->harga)}}</h3>
                    <p>Status : {{$paket->ketersediaan}}</p>
                    <p>{{ $paket->deskripsi}}</p>
                </div>
                @if(auth()->user()->role_id ==2)
                <div class="text-center">
                    <div class="mt-5 text-center">
                        <a href="{{url('paket')}}" class="btn btn-secondary">Batal</a>
                        <a href="{{url('cart/'.$paket->id)}}" class="btn btn-info text-white">Pesan sekarang</a>
                    </div>
                </div>
            @endif
            </div>
  </div>
</div>


@endsection
