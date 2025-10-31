@extends('layouts.pengguna')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    {{-- css anyar --}}

    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
<link rel="stylesheet" href="{{ asset('css/laporan.css') }}">
@endsection

@section('header', 'Laporan')

@section('content')


    {{-- <a href="{{ route('petugas.create') }}" class="btn btn-purple mb-2">Tambah Petugas</a>
    --}}
    
    {{-- form alert --}}
    {{-- <div class="col-lg-8 col-md-12 col-sm-12 col-12 col">
        <div class="content content-top shadow">
            @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
            @endif
            @if (Session::has('pengaduan'))
            <div class="alert alert-{{ Session::get('type') }}">{{ Session::get('pengaduan') }}</div>
            @endif --}}


           
    {{-- form untuk mengisi laporan  --}}
    <div class="container-fluid">
    
    <div class="row">
        <div class="col-lg-9 col-5">
            <div class="card">
                {{-- <div class="content content-top shadow"> --}}
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                    @endif
                    @if (Session::has('pengaduan'))
                    <div class="alert alert-{{ Session::get('type') }}">{{ Session::get('pengaduan') }}</div>
                    @endif
    
                <div class="card-header">
                    Tulis Laporan disini
                </div>
                <div class="card-body">
                    <form action="{{ route('pekat.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                       
                        {{-- <div class="form-group">
                            <label for="nama_proyek">Nama Proyek</label>
                            <input type="text" value="{{ old('nama_proyek') }}" name="nama_proyek"  id="nama_proyek" class="form-control" required>
                        </div> --}}

                        <div class="form-group">
                            <label for="nama_proyek">Nama Proyek</label>
                            <input type="hidden" value="{{ old('nama_proyek') }}" name="nama_proyek"  id="nama_proyek" class="form-control" required>
                        
                            <select class ="custom-select" id="nama_proyek" name="nama_proyek" > 
                                @foreach($proyek as $p)
                                <option value="{{ $p->nama_proyek}}">{{ $p->nama_proyek}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="username">Isi Laporan</label>
                            <textarea name="isi_laporan"  class="form-control"
                            rows="4">{{ old('isi_laporan') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" value="{{ old('tgl_kejadian') }}" name="tgl_kejadian" id="tgl" class="form-control" required>
                        </div>
                     
        

                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" value="{{ old('foto') }}" name="foto" class="form-control">
                        </div>
                        
                      
                        <button type="submit" class="btn btn-purple mb-2" style="width: 100%">Kirim</button>
                    </form>
                {{-- </div> --}}

                </div>
            </div>
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