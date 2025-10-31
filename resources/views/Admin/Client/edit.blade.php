@extends('layouts.karya')

@section('header','Edit Client')
    {{-- <a href="{{ route('client.index') }}" class="text-primary">Data Client</a>
    <a href="#" class="text-grey">/</a>
    <a href="#" class="text-grey">Detail Client</a>
@endsection --}}

@section('content')
<div class="card-body">
    <form action="{{ route('client.update', $client->id_client) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="nama">Nama Client</label>
            <input type="text" value="{{$client->nama}}" name="nama" id="nama" class="form-control" required>
        </div>
        <div class="form-group">
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
  
        <button type="submit" class="btn btn-warning text-white" style="width: 100%">UPDATE</button>
    </form>
@endsection
