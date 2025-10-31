@extends('layouts.karya')
@section('header','Edit Karyawan')
@section('content')
<div class="card-body">
    <form action="{{ route('karyawan.update', $karyawan->id_karyawan) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="nama">Nama karyawan</label>
            <input type="text" value="{{$karyawan->nama_karyawan}}" name="nama_karyawan" id="nama_karyawan" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" value="{{ $karyawan->username }}" name="username" id="username" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="telp">No Telp</label>
            <input type="number" value="{{ $karyawan->telp }}" name="telp" id="telp" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="level">Level</label>
            <div class="input-group mb-3">
                <select name="level" id="level" class="custom-select">
                    @if ($karyawan->level == 'admin')
                    <option selected value="admin">Admin</option>
                    <option value="petugas">Petugas</option>
                    @else
                    <option value="admin">Admin</option>
                    <option selected value="petugas">Petugas</option>
                    @endif
                </select>
            </div>
        </div>
        {{-- <div class="form-group">
            <label for="username">Username</label>
            <input type="text" value="{{ $client->username }}" name="username" id="username" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="telp">No Telp</label>
            <input type="number" value="{{ $client->telp }}" name="telp" id="telp" class="form-control" required>
        </div>
   --}}
        <button type="submit" class="btn btn-warning text-white" style="width: 100%">UPDATE</button>
    </form>
@endsection








{{-- <div class="row">
    <div class="col-lg-6 col-12">
        <div class="card">
            <div class="card-header">
                Form Edit Karyawan
            </div>
            <div class="card-body">
                <form action="{{ route('karyawan.update', $karyawan->id_karyawan) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="nama_petugas">Nama Petugas</label>
                        <input type="text" value="{{ $karyawan->nama_karyawan }}" name="nama_karyawan" id="nama_karyawan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" value="{{ $karyawan->username }}" name="username" id="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="telp">No Telp</label>
                        <input type="number" value="{{ $karyawan->telp }}" name="telp" id="telp" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <div class="input-group mb-3">
                            <select name="level" id="level" class="custom-select">
                                @if ($karyawan->level == 'admin')
                                <option selected value="admin">Admin</option>
                                <option value="petugas">Petugas</option>
                                @else
                                <option value="admin">Admin</option>
                                <option selected value="petugas">Petugas</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning text-white" style="width: 100%">UPDATE</button>
                </form>
                @if ($karyawan->id_petugas != 1)
                <form action="{{ route('karyawan.destroy', $karyawan->id_karyawan) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mt-2" style="width: 100%" onclick="return confirm('APAKAH YAKIN?')">HAPUS</button>
                </form>
                @endif
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-12">
        @if (Session::has('notif'))
            <div class="alert alert-danger">
                {{ Session::get('notif') }}
            </div>
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
            @endforeach
        @endif
    </div>
</div>

 --}}
