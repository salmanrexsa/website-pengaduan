@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endsection

@section('header', 'Data Pengaduan')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            


    <table class="table">
       
        <thead>
           
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Isi Laporan</th>
                <th>Status</th>
                <th>Detail</th>
            </tr>
       
        </thead>
    
        <tbody>
            @foreach ($pengaduan as $k => $v)
            <tr>
                <td>{{ $k += 1 }}</td>
                <td>{{ $v->tgl_pengaduan->format(' d F Y - H:i') }}</td>
                <td>{{ $v->isi_laporan }}</td>
                <td>
                    @if ($v->status == '0')
                        <a href="" class="badge badge-danger">Pending</a>
                    @elseif($v->status == 'proses')
                        <a href="" class="badge badge-warning text-white">Proses</a>
                    @else
                        <a href="" class="badge badge-success">Selesai</a>
                    @endif
                </td>
                <td><a class="btn btn-sm btn-primary" href="{{ route('pengaduan.show', $v->id_pengaduan) }}">Lihat</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
        </div>
    </div>
</div>

@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#pengaduanTable').DataTable();
        } );
    </script>
@endsection