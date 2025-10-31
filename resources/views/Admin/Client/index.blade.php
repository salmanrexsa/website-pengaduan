@extends('layouts.karya')

@section('title', 'Edit Profil')
    
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endsection

@section('header', 'Data Client')
    
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('client.create') }}" class="btn btn-purple mb-2">Tambah Client</a>

    <table id="masyarakatTable" class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Client</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Telp</th>
                <th>Detail</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($client as $k => $v)
            <tr>
                <td>{{ $k += 1 }}</td>
                <td>{{ $v->id_client }}</td>
                <td>{{ $v->nama }}</td>
                <td>{{ $v->username }}</td>
                <td>{{ $v->telp }}</td>
                <td><a href="{{ route('client.show', $v->id_client) }}" style="text-decoration: underline">Lihat</a></td>
                <TD> <a href="{{ route('client.edit', $v->id_client) }}" style="text-decoration: underline">Edit</a></TD>
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
            $('#masyarakatTable').DataTable();
        } );
    </script>
@endsection