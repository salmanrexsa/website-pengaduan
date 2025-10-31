@extends('layouts.admin')

@section('title', 'Halaman Dashboard')
    
@section('header', 'Dashboard')

@section('content')
    
    <div class="row">

        <div class="col-md-6 col-lg-3 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-cyan text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-worker"></i></h1>
                    <h6 class="text-white">Jumlah karyawan</h6>
                    <h3 class="text-white">{{ $petugas }}</h3>
                </div>
            </div>
        </div>


        {{-- 
             --}}

        <div class="col-md-6 col-lg-3 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-primary text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-account-multiple"></i></h1>
                    <h6 class="text-white">Jumlah Client</h6>
                    <h3 class="text-white">{{ $client }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-warning text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-timer-sand"></i></h1>
                    <h6 class="text-white">Pengaduan Di Proses</h6>
                    <h3 class="text-white">{{ $proses }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-success text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-briefcase-check"></i></h1>
                    <h6 class="text-white">Pengaduan Selesai</h6>
                    <h3 class="text-white">{{ $selesai }}</h3>
                </div>
            </div>
        </div>

        
        
       
    </div>
    
@endsection