@extends('layouts.pengguna')

@section('title', 'Halaman Dashboard')

@section('header', 'Selamat Datang')

@section('content')


        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Sales Cards  -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- Column -->
                <div class="col-md-6 col-lg-2 col-xlg-3">
                    <div class="card card-hover">
                        <div class="box bg-cyan text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-autorenew"></i></h1>
                            <h6 class="text-white">Terverivikasi</h6>
                            <h3 class="text-white">{{ $hitung[0] }}</h3>
                        </div>
                    </div>
                </div>
                 <!-- Column -->
                <div class="col-md-6 col-lg-2 col-xlg-3">
                    <div class="card card-hover">
                        <div class="box bg-warning text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-timer-sand"></i></h1>
                            <h6 class="text-white">Sedang di Proses</h6>
                            <h3 class="text-white">{{ $hitung[1] }}</h3>
                        </div>
                    </div>
                </div>
             
                <!-- Column -->
                <div class="col-md-6 col-lg-2 col-xlg-3">
                    <div class="card card-hover">
                        <div class="box bg-success text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-briefcase-check"></i></h1>
                            <h6 class="text-white">Selesai di proses</h6>
                            <h3 class="text-white">{{ $hitung[2] }}</h3>
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
            <!-- ============================================================== -->
            <!-- Sales chart -->
            <!-- ============================================================== -->
            
            <!-- ============================================================== -->
            <!-- Sales chart -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Recent comment and chats -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- column -->
                
                

             
            </div>
            <!-- ============================================================== -->
            <!-- Recent comment and chats -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->








    {{-- <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">Belum di proses</div>
                <div class="card-body">
                    <div class="text-center">
                        {{ $hitung[0] }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">Sedang di Proses</div>
                <div class="card-body">
                    <div class="text-center">
                        {{ $hitung[1] }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">Selesai</div>
                <div class="card-body">
                    <div class="text-center">
                        {{ $hitung[2] }}
                    </div>
                </div>
            </div>
        </div> --}}
@endsection