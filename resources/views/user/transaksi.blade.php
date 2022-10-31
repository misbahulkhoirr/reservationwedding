@extends('layout.app')

@section('content')

<div class="container" style="margin-top: 100px">
      @if (session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
    @endif
      <div class="card">
        <div class="card-header">{{ $title }}</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped ">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Kode Transaksi</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Tanggal Acara</th>
                  <th scope="col">No Telp</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                {{-- @dd($transaksi) --}}
                @foreach ($header_transaksi as $row)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $row->kode_transaksi }}</td>
                  <td>{{ $row->user->name }}</td>
                  <td>{{ $row->tgl_acara }}</td>
                  <td>{{ $row->user->no_telp }}</td>
                  <td>
                    @if($row->status == 'pending')
                      <span class="btn btn-sm bg-danger text-white rounded" style="pointer-events: none">{{ $row->status }}</span>
                    @else
                      <span class="btn btn-sm bg-info text-white rounded" style="pointer-events: none">{{ $row->status }}</span>
                    @endif
                  </td>
                  <td>
                    <a href="{{url('detail_transaksi_user/'.$row->kode_transaksi)}}" class="btn btn-sm btn-info border-0"><i class="fa-solid fa-eye text-white"></i></a>
                  </td>
                </tr>
                @endforeach
                
              </tbody>
            </table>
          </div>
          <div class="col-md-3 text-justify p-2" style="border: 3px dashed  red">
            <p>Rekening : 0683520205 </p>
            <p>Atas Nama : Rusmiyati</p>
            <p>Bank : BNI </p>
          </div>
        </div>
      </div>
     
    </div>
    @endsection

