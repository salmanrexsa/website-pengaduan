@extends('layouts.admin')

@section('title', 'Form Tambah Petugas')
    
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
    </style>
@endsection

@section('header')
    <a href="{{ route('karyawan.index') }}" class="text-primary">Data Proyek</a>
    <a href="#" class="text-grey">/</a>
    <a href="#" class="text-grey">Form Tambah Proyek</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header">
                    Form Tambah Petugas
                </div>
                <div class="card-body">
                    <form action="{{ route('proyek.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama_proyek">Nama Proyek</label>
                            <input type="text" name="nama_proyek" id="nama_proyek" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="id_client">ID Client</label>
                            <input type="number" name="id_client" id="id_client" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="url_proyek">URL Proyek</label>
                            <input type="text" name="url_proyek" id="url_proyek" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success" style="width: 100%">SIMPAN</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12">
            @if (Session::has('username'))
                <div class="alert alert-danger">
                    {{ Session::get('username') }}
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
@endsection

