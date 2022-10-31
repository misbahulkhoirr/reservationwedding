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
                    <a  href="javascript:void(0)" onclick="ubahstatus('{{ $row->id}}')" id='ubah' class="btn btn-sm bg-danger text-white rounded">{{ $row->status }}</a>
                      @else
                      <a  href="javascript:void(0)" onclick="ubahstatus('{{ $row->id}}')"class="btn btn-sm bg-info text-white rounded" id='ubah'>{{ $row->status }}</a>
                      @endif
                  </td>
                  <td>
                    @if($row->read == 1)
                      <a href="{{url('detail_transaksi_admin/'.$row->kode_transaksi)}}" onclick="read('{{ $row->kode_transaksi}}')" class="btn btn-sm btn-danger border-0 fa-regular fa-envelope text-white" value="{{$row->read}}"></a>
                   @else
                      <a href="{{url('detail_transaksi_admin/'.$row->kode_transaksi)}}" class="btn btn-sm btn-info border-0"><i class="fa-regular fa-envelope-open text-white"></i></i></a>
                    @endif
                  </td>
                </tr>
                @endforeach
                
              </tbody>
            </table>
          </div>

        </div>
      </div>
     
    </div>
    @endsection
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous">
</script>
<script>
  function ubahstatus(id){
              $.ajax({
              type: 'POST',
              url: "{{ url('detail_transaksi/ubahstatus') }}/"+id,
              data: "id=" + id + "&_token={{ csrf_token() }}",
              success: function (data) {
                console.log(data.status);
                if(data.status == 'pending'){
                $(':focus').html(data.status)
                $(':focus').removeClass('bg-info');
                $(':focus').addClass('bg-danger');
                }else{
                $(':focus').html(data.status)
                $(':focus').removeClass('bg-danger');
                $(':focus').addClass('bg-info');
                }
              }
          });
  }

  </script>
   <script>
    function read(kode_transaksi){
      $(':focus').removeClass('bg-danger');
      $(':focus').addClass('bg-info');
      $(':focus').removeClass('fa-envelope');
      $(':focus').addClass('fa-envelope-open');
  }
  </script>
