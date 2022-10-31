@extends('layout.app')
@section('content')
<div class="container">
  <div class="card">
      <div class="card-header">{{ $title }}</div>
      <div class="card-body">
          <form action="{{url('entertainment')}}" method="POST" enctype="multipart/form-data">
              @csrf
              {{-- <div class="form-group mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select class="form-control form-select @error('supplier_id') is-invalid @enderror" name="kategori_id" autofocus>
                <option value="">Pilih kategori</option>
                  @foreach ($kategoris as $kategori)
                  @if (old('kategori_id')==$kategori->id)
                  <option value="{{ $kategori->id }}" selected>{{ $kategori->name }}</option>
                  @else
                  <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                  @endif
                  @endforeach
                  
                </select>
                @error('kategori_id')
                <div class="invalid-feedback">
                  {{ $message}}
                </div>
                @enderror
            </div> --}}
              <div class="form-group mb-3">
                  <label for="name" class="form-label">Nama Entertainment</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror col-lg-6" id="name" name="name" autofocus value="{{ old ('name')}}">
                  @error('name')
                  <div class="invalid-feedback">
                      {{ $message}}
                  </div>
                  @enderror
              </div>
              <div class="form-group mb-3">
                  <label for="harga" class="form-label">Harga</label>
                  <input type="number" class="form-control @error('harga') is-invalid @enderror col-lg-6" id="harga" name="harga" autofocus value="{{ old ('harga')}}">
                  @error('harga')
                  <div class="invalid-feedback">
                      {{ $message}}
                  </div>
                  @enderror
              </div>
              <div class="form-group mb-3">
                <label for="ketersediaan" class="form-label">Ketersediaan</label>
                <select class="form-control form-select @error('ketersediaan') is-invalid @enderror" name="ketersediaan" autofocus>
                <option value="">-- Pilih --</option>
                <option value="Tersedia" @if (old('ketersediaan') == 'Tersedia') selected="selected" @endif>Tersedia</option>
                <option value="Tidak tersedia" @if (old('ketersediaan') == 'Tidak tersedia') selected="selected" @endif>Tidak tersedia</option>
                </select>
                @error('ketersediaan')
                <div class="invalid-feedback">
                  {{ $message}}
                </div>
                @enderror
            </div>

              {{-- <div class="form-group mb-3">
                <label for="ketersediaan" class="form-label">Ketersediaan</label>
                <input type="text" class="form-control @error('ketersediaan') is-invalid @enderror" id="ketersediaan" name="ketersediaan" autofocus value="{{ old ('ketersediaan')}}">
                @error('ketersediaan')
                <div class="invalid-feedback">
                    {{ $message}}
                </div>
                @enderror
            </div> --}}
              <div class="form-group mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                  <input type="file" class="dropify  @error('gambar') is-invalid @enderror" name="gambar">
              </div>
              <div class="form-group">
                  <label for="deskripsi" class="form-label">Deskripsi</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" id="deskripsi" name="deskripsi" autofocus value="{{ old ('deskripsi')}}"></textarea>
                  @error('deskripsi')
                  <div class="invalid-feedback">
                      {{ $message}}
                  </div>
                  @enderror
              </div>
              
              
              <div class="mt-5 text-center">
                  <a href="{{url('entertainment')}}" class="btn btn-secondary">Batal</a>
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
