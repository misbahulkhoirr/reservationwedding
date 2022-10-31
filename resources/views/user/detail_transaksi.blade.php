@extends('layout.app')

@section('content')

<div class="container" style="margin-top: 100px">
      <div class="card">
        <div class="card-header">{{ $title }}</div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              
              <div class="row">
                <div class="col-md-4"><p class="fw-bold">Kode Transaksi</p></div><div class="col-md-1"><p>:</p></div>
                <div class="col-md-7"><p>{{$header_transaksi[0]->kode_transaksi}}</p></div>
              </div>
              <div class="row">
                <div class="col-md-4"><p class="fw-bold">Nama</p></div><div class="col-md-1"><p>:</p></div>
                <div class="col-md-7"><p>{{$header_transaksi[0]->user->name}}</p></div>
              </div>
              <div class="row">
                <div class="col-md-4"><p class="fw-bold">Alamat</p></div><div class="col-md-1"><p>:</p></div>
                <div class="col-md-7"><p>{{$header_transaksi[0]->user->alamat}}</p></div>
              </div>
              <div class="row">
                <div class="col-md-4"><p class="fw-bold">No. Telp</p></div><div class="col-md-1"><p>:</p></div>
                <div class="col-md-7"><p>{{$header_transaksi[0]->user->no_telp}}</p></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-4"><p class="fw-bold">Tanggal_acara</p></div><div class="col-md-1"><p>:</p></div>
                <div class="col-md-7"><p>{{$header_transaksi[0]->tgl_acara}}</p></div>
              </div>
              <div class="row">
                <div class="col-md-4"><p class="fw-bold">Status</p></div><div class="col-md-1"><p>:</p></div>
                <div class="col-md-7">
                  @if($header_transaksi[0]->status == 'pending')
                  <p class="btn btn-sm bg-danger text-white rounded" style="pointer-events: none">{{$header_transaksi[0]->status}}</p></div>
                  @else 
                  <p class="btn btn-sm bg-info text-white rounded" style="pointer-events: none">{{$header_transaksi[0]->status}}</p></div>
                  @endif
              </div>
            </div>
          </div>

          <div class="row mt-5">
            <div class="table-responsive">
              <table class="table table-striped ">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($transaksi as $row)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><img src="{{ asset('storage/'.$row->produk->gambar) }}" width="100" height="100" alt="..."></td>
                    <td>{{ $row->produk->name }}</td>
                    <td>Rp. {{ number_format($row->harga) }}</td>
                  </tr>
                  @endforeach
                  <tr class="fw-bold">
                    <td>Subtotal</td>
                    <td></td>
                    <td></td>
                    <td>Rp. {{number_format($subtotal)}}</td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
    @endsection
   