@extends('layouts.admin')

{{-- @section('title', 'Detail Client')
    
{{-- @section('css')
    <style>
        .text-primary:hover {
            text-decoration: underline;
        }

        .text-grey {
            color: #6c757d;
        }

        .text-grey:hover {
            color: #6c757d;
        }
    </style>
@endsection --}}

@section('header', 'Data Client')
    {{-- <a href="{{ route('client.index') }}" class="text-primary">Data Client</a>
    <a href="#" class="text-grey">/</a>
    <a href="#" class="text-grey">Detail Client</a>
@endsection --}}

@section('content')
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        Detail Client
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>ID Client</th>
                                <td>:</td>
                                <td>{{ $client->id_client }}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>:</td>
                                <td>{{ $client->nama }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>:</td>
                                <td>{{ $client->email }}</td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td>:</td>
                                <td>{{ $client->username }}</td>
                            </tr>
                            <tr>
                                <th>No Telp</th>
                                <td>:</td>
                                <td>{{ $client->telp }}</td>
                            </tr>
                            <tr>
                                <th>Hapus</th>
                                <td>:</td>
                                <td>
                                    <form action="{{ route('client.destroy', $client->id_client) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" style="width: 100%" onclick="return confirm('APAKAH YAKIN?')">HAPUS</button>
                                    </form>
                                </td>
                            </tr>

                            {{-- <tr>
                                <th>Edit</th>
                                <td>:</td>
                                <td>
                                    <a href="{{ route('Client/edit') }}" style="text-decoration: underline">Lihat</a>
                                </td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12">
            @if (Session::has('notif'))
                <div class="alert alert-danger">
                    {{ Session::get('notif') }}
                </div>
            @endif
        </div>
    </div>
@endsection