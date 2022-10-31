{{-- @dd($produk) --}}
{{-- @dd(auth()->user()); --}}
@extends('layout.app')
@section('content')
<div class="container">
  <div class="card">
      <div class="card-header">{{ $title }}</div>
      <div class="card-body">
            @if ($produk->gambar)
            <img src="{{ asset('storage/'.$produk->gambar) }}" class="card-img-top" height="500" alt="...">
            @else
            <img src="{{('assets/img/placeholder.png')}}" class="card-img-top" width="200" height="200" alt="...">
            @endif
            <div class="text-center mt-3">
                <h2>{{$produk->name}}</h2>
                <h3>Rp. {{number_format($produk->harga)}}</h3>
                <p>Status : {{$produk->ketersediaan}}</p>
            </div>
        
        
          <form action="{{url('booking')}}" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="form-group mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror col-lg-6" id="name" name="name" autofocus value="{{ old ('name', auth()->user()->name)}}">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message}}
                </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="no_telp" class="form-label">No Telepon</label>
                <input type="text" class="form-control @error('no_telp') is-invalid @enderror col-lg-6" id="no_telp" name="no_telp" autofocus value="{{ old ('no_telp', auth()->user()->no_telp)}}">
                @error('no_telp')
                <div class="invalid-feedback">
                    {{ $message}}
                </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="tgl_mulai" class="form-label">Tanggal Mulai</label>
                <input type="date" class="form-control @error('tgl_mulai') is-invalid @enderror col-lg-6" id="tgl_mulai" name="tgl_mulai" autofocus value="{{ old ('tgl_mulai', $produk->tgl_mulai)}}">
                @error('tgl_mulai')
                <div class="invalid-feedback">
                    {{ $message}}
                </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="tgl_selesai" class="form-label">Tanggal Selesai</label>
                <input type="date" class="form-control @error('tgl_selesai') is-invalid @enderror col-lg-6" id="tgl_selesai" name="tgl_selesai" autofocus value="{{ old ('tgl_selesai', $produk->tgl_selesai)}}">
                @error('tgl_selesai')
                <div class="invalid-feedback">
                    {{ $message}}
                </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" id="alamat" name="alamat" autofocus value="{{ old ('alamat')}}"></textarea>
                @error('alamat')
                <div class="invalid-feedback">
                    {{ $message}}
                </div>
                @enderror
            </div>
              <div class="form-group mb-3">
                  <label for="total_pembayaran" class="form-label">Total Pembayaran</label>
                  <input type="number" class="form-control" id="total_pembayaran" name="total_pembayaran" value="{{ $produk->harga}}" readonly disabled>
                  @error('total_pembayaran')
                  <div class="invalid-feedback">
                      {{ $message}}
                  </div>
                  @enderror
              </div>
              <div class="mt-5 text-center">
                  <a href="{{url('produk')}}" class="btn btn-secondary">Batal</a>
                  <button type="submit" class="btn btn-info text-white">Simpan</button>
              </div>
          </form>
      </div>
  </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();

            $('.dropify-clear').click(function(e) {
                e.preventDefault();
                alert('Remove Hit');

            });
        });
    </script>

@endsection
