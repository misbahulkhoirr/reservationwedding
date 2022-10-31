@extends('layout.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ $title }}</div>
            <div class="card-body">
                @if ($pelaminan->gambar)
                <img src="{{ asset('storage/'.$pelaminan->gambar) }}" class="card-img-top" height="500" alt="...">
                @else
                <img src="{{('assets/img/placeholder.png')}}" class="card-img-top" width="200" height="200" alt="...">
                @endif
                <div class="text-center mt-3">
                    <h2>{{$pelaminan->name}}</h2>
                    <h3>Rp. {{number_format($pelaminan->harga)}}</h3>
                    <p>Status : {{$pelaminan->ketersediaan}}</p>
                    <p>{{ $pelaminan->deskripsi}}</p>
                </div>
                @if(auth()->user()->role_id ==2)
                <div class="text-center">
                    <div class="mt-5 text-center">
                        <a href="{{url('pelaminan')}}" class="btn btn-secondary">Batal</a>
                        <a href="{{url('cart/'.$pelaminan->id)}}" class="btn btn-info text-white">Pesan sekarang</a>
                    </div>
                </div>
            @endif
            </div>
  </div>
</div>


@endsection
