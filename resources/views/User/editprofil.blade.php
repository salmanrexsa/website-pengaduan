@extends('layouts.pengguna')

@section('title', 'Edit Profil')
    
@section('css')
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

        .btn-purple {
            background: #6a70fc;
            border: 1px solid #6a70fc;
            color: #fff;
            width: 100%;
        }
    </style>
@endsection

@section('header')
    <a href="{{ route('pengaduan.index') }}" class="text-primary">Data Client</a>
    <a href="#" class="text-grey">/</a>
    <a href="#" class="text-grey">Data Client</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        Data Client
                    </div>
                </div>
                <div class="card-body">
                    @if (Session::has('status'))
                    <div class="alert alert-success mt-2">
                        {{ Session::get('status') }}
                    </div>
                    @endif

                    <form action="{{ route('updateprofil') }}" method="POST">
                        
                        @csrf
                        {{-- @method('PATCH') --}}
                      
                            
                            <input type="hidden" value="{{$client->id_client}}" name="id_client" id="id_client" class="form-control" required>
                       
                        <div class="form-group">
                            <label for="nama_petugas">Nama Client</label>
                            <input type="text" value="{{$client->nama}}" name="nama" id="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" value="{{$client->username}}" name="username" id="username" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="username">Email</label>
                            <input type="text" value="{{$client->email}}" name="email" id="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="telp">No Telp</label>
                            <input type="number" value="{{$client->telp}}" name="telp" id="telp" class="form-control" required>
                        </div>
                       
                        <button type="submit" class="btn btn-warning text-white" style="width: 100%">UPDATE</button>
                    </form>
                  
                    {{-- <table class="table">
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
                            <td><a href="{{ route('editprofil') }}" style="text-decoration: underline">Lihat</a></td>
                        </tbody>
                    </table> --}}
                </div>
            </div>
        </div>
    </div>
@endsection