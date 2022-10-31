@extends('layout.app')

@section('content')

<div class="container" style="margin-top: 100px">
      @if (session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
      @endif

      <div class="row mb-3 mt-3">
        <div class="d-flex justify-content-end">
          @if(auth()->user()->role_id ==1)
          <a href="{{url('busana/create')}}" class="btn btn-info text-white">+ Tambah Data</a>
          @endif
        </div>
    </div>
    <div class="row text-center">
      @foreach($busana as $row)
        <div class="col-md-4">
          <a href="busana/{{$row->id}}" style="text-decoration: none; color:rgb(29, 28, 28)">
            <div class="card shadow rounded">
              @if ($row->gambar)
              <img src="{{ asset('storage/'.$row->gambar) }}" class="card-img-top" width="200" height="200" alt="...">
              @else
              <img src="{{('assets/img/placeholder.png')}}" class="card-img-top" width="200" height="200" alt="...">
              @endif
                <div class="card-body">
                  <h3 class="card-text">{{$row->name}}</h3>
                  <p class="card-text" style="color: red">Rp. {{number_format($row->harga)}}</p>
                  <p class="card-text">{{$row->ketersediaan}}</p>
                  @if(auth()->user()->role_id ==1)
                  <div class="row mt-3">
                    <div class="col-md-6">
                      
                      <a href="busana/{{$row->id}}/edit" class="btn btn-sm btn-info text-white d-block"><i class="fa-solid fa-pen-to-square"></i></a>
                    </div>
                    <div class="col-md-6">
                    <form action="{{url('busana/'.$row->id)}}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-sm btn-danger w-100"  onclick="return confirm('Yakin ingin menghapus ?')"><i class="fa-solid fa-trash-can"></i></button>
                    </form>
                    </div>
                  </div>
                  @endif
                </div>
              </div>
        </div>
       @endforeach
    </div>
</div>
@endsection
