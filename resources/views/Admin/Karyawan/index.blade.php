@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endsection

@section('header', 'Data Karyawan')

@section('content')
    <div class="row">
        <div class ="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('karyawan.create') }}" class="btn btn-purple mb-2">Tambah Karyawan</a>
               
                    <table  class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Karyawan</th>
                                <th>Username</th>
                                <th>Telp</th>
                                <th>Level</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($petugas as $k => $v)
                            <tr>
                                <td>{{ $k += 1 }}</td>
                                <td>{{ $v->nama_karyawan }}</td>
                                <td>{{ $v->username }}</td>
                                <td>{{ $v->telp }}</td>
                                <td>{{ $v->level }}</td>
                                <td><a href="{{ route('karyawan.edit', $v->id_karyawan) }}" style="text-decoration: underline">Lihat</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#petugasTable').DataTable();
        } );
    </script>
@endsection