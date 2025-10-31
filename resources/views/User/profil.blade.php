@extends('layouts.pengguna')

@section('title', 'Data Profil')
    

@section('header', ' Profil')

@section('content')
    <div class="row">
        <div class="col-lg-6 col-12">
        @if (Session::has('status'))
        <div class="alert alert-success mt-2">
            {{ Session::get('status') }}
        </div>
        @endif
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        Pengaduan Client
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>ID Client</th>
                                <td>:</td>
                                <td>{{ Auth::guard('client')->user()->id_client }}</td>
                            </tr>
                            <tr>
                                <th>Nama Client</th>
                                <td>:</td>
                                <td>{{ Auth::guard('client')->user()->nama }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>:</td>
                                <td>{{ Auth::guard('client')->user()->email }}</td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td>:</td>
                                <td>{{ Auth::guard('client')->user()->username }}</td>
                            </tr>
                            <tr>
                                <th>No telp</th>
                                <td>:</td>
                                <td>{{ Auth::guard('client')->user()->telp }}</td>
                            </tr>
                            <td><a href="{{ route('editprofil')}}" class="mdi mdi-pencil-box" style="text-decoration: underline">Edit</a></td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection