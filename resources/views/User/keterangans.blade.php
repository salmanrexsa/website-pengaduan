@extends('layouts.pengguna')

@section('css')
<link rel="stylesheet" href="{{ asset('css/landing.css') }}">
<link rel="stylesheet" href="{{ asset('css/laporan.css') }}">

@endsection

@section('content')



 {{-- isi  --}}
 <div class="row mt-5">
    <div class="col-lg-8">
        <a class="d-inline tab {{ $siapa != 'me' ? 'tab-active' : ''}} mr-4" href="{{ route('pekat.laporan') }}">
            Semua
        </a>
        <a class="d-inline tab {{ $siapa == 'me' ? 'tab-active' : ''}}" href="{{ route('pekat.laporan', 'me') }}">
            Laporan Saya
        </a>
        <hr>
    </div>
    @foreach ($pengaduan as $k => $v)
    <div class="col-lg-8">
        <div class="laporan-top">
            <img src="{{ asset('images/user_default.svg') }}" alt="profile" class="profile">
            <div class="d-flex justify-content-between">
                <div>
                    <p>{{ $v->user->nama }}</p>
                    @if ($v->status == '0')
                    <p class="text-danger">Pending</p>
                    @elseif($v->status == 'proses')
                    <p class="text-warning">{{ ucwords($v->status) }}</p>
                    @else
                    <p class="text-success">{{ ucwords($v->status) }}</p>
                    @endif
                </div>
                <div>
                    <p>{{ $v->tgl_pengaduan->format('d M, h:i') }}</p>
                </div>
            </div>
        </div>
        <div class="laporan-mid">
            <div class="judul-laporan">
                {{ $v->judul_laporan }}
            </div>
            <p>{{ $v->isi_laporan }}</p>
        </div>
        <div class="laporan-bottom">
            @if ($v->foto != null)
            <img src="{{ Storage::url($v->foto) }}" alt="{{ 'Gambar '.$v->judul_laporan }}" class="gambar-lampiran">
            @endif
            @if ($v->tanggapan != null)
            <p class="mt-3 mb-1">{{ '*Tanggapan dari '. $v->tanggapan->petugas->nama_petugas }}</p>
            <p class="light">{{ $v->tanggapan->tanggapan }}</p>
            @endif
        </div>
        <hr>
    </div>
    @endforeach
</div>

{{-- Footer --}}
<div class="mt-5">
    <hr>
    <div class="text-center">
        <p class="italic text-secondary">© 2022 Dexza • All rights reserved</p>
    </div>
</div>
@endsection

@section('js')
@if (Session::has('pesan'))
<script>
    $('#loginModal').modal('show');

</script>
@endif

@endsection