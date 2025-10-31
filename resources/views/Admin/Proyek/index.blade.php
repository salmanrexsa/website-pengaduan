@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endsection

@section('header', 'Data Proyek')

@section('content')
    <div class="row">
        <div class ="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('proyek.create') }}" class="btn btn-purple mb-2">Tambah Proyek</a>

<table  class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>ID Proyek</th>
            <th>Nama Proyek</th>
            <th>ID Client</th>
            <th>URL Proyek</th>
            <th>Aksi</th>
         
        </tr>
    </thead>
    <tbody>
        @foreach ($proyek as $k => $v)
        <tr>
            <td>{{ $k += 1 }}</td>
            <td>{{ $v->id_proyek }}</td>
            <td>{{ $v->nama_proyek }}</td>
            <td>{{ $v->id_client }}</td>
            <td>{{ $v->url_proyek }}</td>
            <td><a href="" style="text-decoration: underline">Lihat</a></td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
</div>
</div>
</div>
@endsection