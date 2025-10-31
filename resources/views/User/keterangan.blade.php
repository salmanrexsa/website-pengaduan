@extends('layouts.pengguna')

@section('title', 'Halaman Pengaduan')

@section('header','Riwayat Pengaduan')

@section('content')


    <!-- ============================================================== -->
    <!-- Sales Cards  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-body">
<table  class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>No Resi</th>
            <th>Waktu</th>
            <th>Proyek</th>
            <th>Laporan</th>
            <th>Foto</th>
            <th>Status</th>
            <th>Tanggapan</th>
            <th>Foto Tanggapan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pengaduan as $k => $v)
        <tr>
            <td>{{ $k += 1 }}</td>
            <td>{{ $v->kode_booking }}</td>
            <td>{{ $v->tgl_pengaduan->format(' d F Y - H:i') }}</td>
            <td>  {{ $v->nama_proyek }}</td>
            <td>{{ $v->isi_laporan }}</td>
            <td><img style="width: 100px" src="{{ url("assets/pengaduan/".$v->foto) }}" alt="user" /></td>
            <td>
                @if ($v->status == '0')
                <p class="badge badge-danger">Pending</p>
                @elseif($v->status == 'proses')
                <p class="badge badge-warning text-white">{{ ucwords($v->status) }}</p>
                @else
                <p class="badge badge-success">{{ ucwords($v->status) }}</p>
                @endif
            </td>
            <td>
                @if ($v->tanggapan != null)
                <p class="mt-3 mb-1">{{  $v->tanggapan->nama_petugas }}</p>
                <p class="dark">{{ $v->tanggapan->tanggapan }}</p>
                @else
                <p class="dark">belum ada tanggapan</p>
                @endif
            </td>
            <td>
                @if ($v->tanggapan !=null)
                <p><img style="width: 100px" src="{{ url("assets/tanggapan/".$v->tanggapan->foto) }}" alt="user" /></p>
                    @else
                  <p class="dark">belum ada tanggapan</p>
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