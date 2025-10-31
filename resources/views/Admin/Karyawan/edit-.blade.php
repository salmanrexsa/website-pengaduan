@extends('layouts.admin')

@section('title', 'Detail Edit Karyawan')
    
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
    <a href="{{ route('pengaduan.index') }}" class="text-primary">Data Pengaduan</a>
    <a href="#" class="text-grey">/</a>
    <a href="#" class="text-grey">Detail Edit Karyawan</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6 col-12">
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
                                <td>lorem ipsum</td>
                            </tr>
                            <tr>
                                <th>Nama Client</th>
                                <td>:</td>
                                <td>lorem ipsum</td>
                            </tr>
                            
                           
                        
                         
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        Tanggapan Admin
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection