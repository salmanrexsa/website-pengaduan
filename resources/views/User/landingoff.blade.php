@extends('layouts.user')

@section('css')
<link rel="stylesheet" href="{{ asset('css/landing.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
{{-- <style>
    .notification {
        padding: 14px;
        text-align: center;
        background: #f4b704;
        color: #fff;
        font-weight: 300;
    }

    .btn-white {
        background: #fff;
        color: #000;
        text-transform: uppercase;
        padding: 0px 25px 0px 25px;
        font-size: 14px;
    }

    .btn-facebook {
        background: #3b66c4;
        width: 100%;
        color: #fff;
        font-weight: 600;
    }

    .btn-facebook:hover {
        background: #3b66c4;
        width: 100%;
        color: #fff;
        font-weight: 600;
    }

    .btn-google {
        background: #cf4332;
        width: 100%;
        color: #fff;
        font-weight: 600;
    }

    .btn-google:hover {
        background: #cf4332;
        width: 100%;
        color: #fff;
        font-weight: 600;
    }

</style> --}}
@endsection

@section('title', 'DEXZA - Pengaduan Client')

@section('content')
{{-- Section Header --}}
<section class="header">
    {{-- @if (Auth::guard('client')->check() && Auth::guard('client')->user()->email_verified_at == null)
    <div class="row">
        <div class="col">
            <div class="notification">
                Konfirmasi email <span class="font-weight-bold">{{ Auth::guard('client')->user()->email }}</span>
                untuk melindungi akun Anda.
                <form action="{{ route('pekat.sendVerification') }}" method="POST" style="display: inline-block">
                    @csrf
                    <button type="submit" class="btn btn-white">Verifikasi Sekarang</button>
                </form>
            </div>
        </div>
    </div>
    @endif
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent"> --}}
        {{-- <div class="container">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <h4 class="semi-bold mb-0 text-white">DEXZA QnA</h4> --}}
                    {{-- <p class="italic mt-0 text-white">Q & A</p> --}}
                {{-- </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> --}}
                {{-- <div class="collapse navbar-collapse" id="navbarNav"> --}}
                    {{-- @if(Auth::guard('client')->check())
                    <ul class="navbar-nav text-center ml-auto">
                        <li class="nav-item">
                            <a class="nav-link ml-3 text-white" href="{{ route('user.laporan','me') }}">Laporan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ml-3 text-white" href="{{ route('pekat.logout') }}"
                                style="text-decoration: underline">{{ Auth::guard('client')->user()->nama }}</a>
                        </li>
                    </ul>
                    @else
                    <ul class="navbar-nav text-center ml-auto"> --}}
                        {{-- <ul class="navbar-nav text-center ml-auto">
                        <li class="nav-item">
                            <button class="btn text-white" type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#loginModal">Masuk</button>
                        </li>
                        </ul> --}}
{{--                 
                </div>
            </div>
        </div>
    </nav> --}}

    {{-- <div class="text-center">
        <h2 class="medium text-white mt-3">Layanan Pengaduan Client</h2>
        <p class="italic text-white mb-5">Sampaikan laporan Anda langsung</p>
    </div> --}}

    {{-- <div class="wave wave1"></div>
    <div class="wave wave2"></div>
    <div class="wave wave3"></div>
    <div class="wave wave4"></div> --}}
</section>


<div class="row justify-content-center">
    <div class="col-lg-6 col-10 col">
        <div class="content shadow">
            <form action="{{route('golekikode')}}" method="GET" id="golekiwoy">
                <input type="text" name="cari" placeholder="masukkan" value="{{ old('cari')}}">
               
                
                <button type="submit" class="btn btn-primary" data-toggle="modal"
                                        data-target="#loginModal">Cari</button>

                        
            </form>
        </div>
    </div>
</div>


{{-- Section Card Pengaduan --}}
{{-- <div class="row justify-content-center">
    <div class="col-lg-6 col-10 col">
        <div class="content shadow">

            @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
            @endif

            @if (Session::has('pengaduan'))
            <div class="alert alert-{{ Session::get('type') }}">{{ Session::get('pengaduan') }}</div>
            @endif

            <div class="card mb-3">Tulis Laporan Disini</div>
            <form action="{{ route('pekat.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" value="{{ old('nama_proyek') }}" name="nama_proyek"
                        placeholder="Masukkan Nama Proyek" class="form-control">
                </div>
                <div class="form-group">
                    <textarea name="isi_laporan" placeholder="Masukkan Isi Laporan" class="form-control"
                        rows="4">{{ old('isi_laporan') }}</textarea>
                </div>
                <div class="form-group">
                    <input type="text" value="{{ old('tgl_kejadian') }}" name="tgl_kejadian"
                        placeholder="Pilih Tanggal Kejadian" class="form-control" onfocusin="(this.type='date')"
                        onfocusout="(this.type='text')">
                </div>
    
          
                <div class="form-group">
                    <input type="file" name="foto" class="form-control">
                </div>
                <button type="submit" class="btn btn-custom mt-2">Kirim</button>
            </form>
        </div>
    </div>
</div> --}}
{{-- Section Hitung Pengaduan --}}

{{-- Footer --}}
{{-- <div class="mt-5">
    <hr>
    <div class="text-center">
        <p class="italic text-secondary">© 2022 Dexza</p>
    </div>
</div> --}}
{{-- Modal --}}
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div id="jolalihasile"></div>
                
                {{-- <form action="{{ route('pekat.login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username atau Email</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-purple text-white mt-3" style="width: 100%">MASUK</button>
                </form> --}}
                {{-- @if (Session::has('pesan'))
                <div class="alert alert-danger mt-2">
                    {{ Session::get('pesan') }}
                </div>
                @endif --}}
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')
@if (Session::has('pesan'))

@endif
<script>
    $(document).ready(function (){
        $('#golekiwoy').submit(function () {
            $.ajax({
                type : 'get',
                url : $(this).attr('action'),
                data : $(this).serialize(),
                success: function (result) {
                    $('#loginModal').modal('show');
                    $('#jolalihasile').html(result);
                }
            });
            return false;
    });
    });

</script>
@endsection
