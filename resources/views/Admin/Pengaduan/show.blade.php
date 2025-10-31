@extends('layouts.karya')

@section('title', 'Detail Pengaduan')
    
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

@section('header', 'Detail Pengaduan')
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
                                <td>{{ $pengaduan->id_client }}</td>
                            </tr>
                            <tr>
                                <th>Nama Client</th>
                                <td>:</td>
                                <td>{{ $pengaduan->user->nama }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Pengaduan</th>
                                <td>:</td>
                                <td>{{ $pengaduan->tgl_pengaduan->format('d-M-Y') }}</td>
                            </tr>
                            <tr>
                                <th>Foto</th>

                            
                                <td>:</td>
                              

                               
                            <td>
                                <div class="col-lg-3 col-md-6">
                                    <div class="card">
                                        <div class="el-card-item">
                                            <div class="el-card-avatar el-overlay-1"> <img style="width: 100px" src="{{ url("assets/pengaduan/".$pengaduan->foto) }}" alt="user" />
                                                <div class="el-overlay">
                                                    <ul class="list-style-none el-info">
                                                        <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="{{ url("assets/pengaduan/".$pengaduan->foto) }}"><i class="mdi mdi-magnify-plus"></i></a></li>
                                                        </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            </tr>
                            <tr>
                                <th>Nama Proyek</th>
                                <td>:</td>
                                <td>{{ $pengaduan->nama_proyek }}</td>
                            </tr>
                            <tr>
                                <th>Isi Laporan</th>
                                <td>:</td>
                                <td>{{ $pengaduan->isi_laporan }}</td>
                            </tr>
                           
                                <th>Status</th>
                                <td>:</td>
                                <td>
                                    @if ($pengaduan->status == '0')
                                        <a href="" class="badge badge-danger">Pending</a>
                                    @elseif($pengaduan->status == 'proses')
                                        <a href="" class="badge badge-warning text-white">Proses</a>
                                    @else
                                        <a href="" class="badge badge-success">Selesai</a>
                                    @endif
                                </td>
                            </tr>
                            {{-- <tr>
                                <th>Lokasi Kejadian</th>
                                <td>:</td>
                                <td>{{ $pengaduan->lokasi_kejadian }}</td>
                            </tr> --}}
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
                <div class="card-body">
                    <form action="{{ route('tanggapan.createOrUpdate') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_pengaduan" value="{{ $pengaduan->id_pengaduan }}">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <div class="input-group mb-3">
                                <select name="status" id="status" class="custom-select">
                                    @if ($pengaduan->status == '0')
                                        <option selected value="0">Pending</option>
                                        <option value="proses">Proses</option>
                                        <option value="selesai">Selesai</option>
                                    @elseif($pengaduan->status == 'proses')
                                        <option value="0">Pending</option>
                                        <option selected value="proses">Proses</option>
                                        <option value="selesai">Selesai</option>
                                    @else
                                        <option value="0">Pending</option>
                                        <option value="proses">Proses</option>
                                        <option selected value="selesai">Selesai</option>
                                    @endif
                                </select>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="tanggapan">Tanggapan</label>
                            <textarea name="tanggapan" id="tanggapan" rows="4" class="form-control" placeholder="Belum ada tanggapan" required>{{ $tanggapan->tanggapan ?? '' }}</textarea>
                        </div>
                        
                        

                            <div class="form-group">
                                <label for="foto">Foto Tanggapan</label>
                                <input type="file" id="foto" name="foto" class="form-control">
                                @if (isset($tanggapan[0]))
                                <div class="col-lg-3 col-md-6">
                                    <div class="card">
                                        <div class="el-card-item">
                                            <div class="el-card-avatar el-overlay-1"> <img style="width: 100px" src="{{ url("assets/tanggapan/".$tanggapan->foto) }}" alt="user" />
                                                <div class="el-overlay">
                                                    <ul class="list-style-none el-info">
                                                        <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="{{ url("assets/tanggapan/".$tanggapan->foto) }}" ><i class="mdi mdi-magnify-plus"></i></a></li>
                                                        </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <p>Silahkan masukkan foto</p>
                                @endif
                            </div>

                        <button type="submit" class="btn btn-purple">KIRIM</button>
                    </form>
                    @if (Session::has('status'))
                        <div class="alert alert-success mt-2">
                            {{ Session::get('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection