@extends('layout.app')

@section('content')

<div class="container" style="margin-top: 100px">
      @if (session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
      <div class="row alert alert-info mt-5">
        <p>Untuk proses pembayaran hanya melakukan transfer ke rekening yang tertera dibawah. Terima kasih</p>
      </div>
      <div class="row mt-5">
        <div class="col-md-3 text-justify p-2" style="border: 3px dashed  red">
          <p>Rekening : 0683520205 </p>
          <p>Atas Nama : Rusmiyati</p>
          <p>Bank : BNI </p>
        </div>
      </div>
      {{-- @dd($cart) --}}
      @elseif(count($cart) == 0)
      <div class="row alert alert-info mt-5 text-center">
        <h3>Keranjang anda masih kosong</h3>
      </div>
      @else
      <div class="card">
        <div class="card-header">{{ $title }}</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped ">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Gambar</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($cart as $row)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td><img src="{{ asset('storage/'.$row->produk->gambar) }}" width="100" height="100" alt="..."></td>
                  <td>{{ $row->produk->name }}</td>
                  <td>Rp. {{ number_format($row->harga) }}</td>
                  <td>
    
                    <form action="{{url('cart/'.$row->id) }}" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class="btn btn-sm btn-danger border-0" onclick="return confirm('Yakin ingin menghapus ?')"><i class="fa-solid fa-trash-can"></i></button>
                    </form>
                  </td>
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

          <div class="row mt-3">
            <div class="col-md-3 text-justify p-2" style="border: 3px dashed  red">
              <p>Rekening : 0683520205 </p>
              <p>Atas Nama : Rusmiyati</p>
              <p>Bank : BNI </p>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <form action="{{url('transaksi/')}}" method="POST" class="d-inline">
                @csrf
                <div class="row align-items-center mt-5">
                  <div class="col-auto">
                    <label for="tgl_acara" class="col-form-label">Tanggal Acara</label>
                  </div>
                  <div class="col-auto">
                    <input type="date" class="form-control @error('tgl_acara') is-invalid @enderror col-lg-6" id="tgl_acara" name="tgl_acara" autofocus value="{{ old ('tgl_acara')}}">
                      @error('tgl_acara')
                      <div class="invalid-feedback">
                          {{ $message}}
                      </div>
                      @enderror
                  </div>

                  <div class="col-auto">
                    <button type="submit" class="btn btn-info text-white">Kirim</button>
                </div>

              </form>
            </div>
          </div>

        </div>
      </div>
      @endif
     
    </div>
    @endsection
