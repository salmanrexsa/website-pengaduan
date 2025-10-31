@extends('layouts.admin')

@section('title', 'Form Tambah Client')
    
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
    <a href="#" class="text-primary">Data Client</a>
    <a href="#" class="text-grey">/</a>
    <a href="#" class="text-grey">Form Tambah Client</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header">
                    Form Tambah Client
                </div>
                <div class="card-body">
                    <form class="form-horizontal m-t-20" action="{{ route('client.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama_karyawan">Nama</label>
                            <input type="text" VALUE="{{ old('nama') }}" name="nama" id="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Email</label>
                            <input type="text" value="{{ old('email')}}"  name="email" id="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" value="{{ old('username')}}" name="username" id="username" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for ="password">Password</label>
                            <input type="password" value="{{ old('password')}}" name="password" id="password" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="telp">No Telp</label>
                            <input type="text" value="{{old('telp')}}" name="telp" id="telp" class="form-control" required>
                        </div>
                      
                        <button type="submit" class="btn btn-success" style="width: 100%">SIMPAN</button>
                    

                        {{-- @csrf
                          <div class="row p-b-30">
                              <div class="col-12">
                                  <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                      </div>
                                      <input type="text" VALUE="{{ old('nama') }}" name="nama" class="form-control form-control-lg" placeholder="Masukkan Nama" aria-label="Username" aria-describedby="basic-addon1" required>
                                      @error('nama')
                                      <div class="invalid-feedback">
                                          {{ $message }}
                                      </div>
                                      @enderror
                                      </div>
                                  <!-- email -->
                                  <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="ti-email"></i></span>
                                      </div>
                                      <input type="email" value="{{ old('email')}}" name="email" class="form-control form-control-lg" placeholder="Email Address" aria-label="Username" aria-describedby="basic-addon1" required>
                                      @error('email')
                                      <div class="invalid-feedback">
                                          {{$message}}
                                      </div>
                                      @enderror
                                  </div>
                                  <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                      </div>
                                      <input type="text" value="{{ old('username') }}" name="username" class="form-control form-control-lg" placeholder="Username" aria-label="Password" aria-describedby="basic-addon1" required>
                                      @error('username')
                                      <div class="invalid-feedback">
                                      {{ $message }}
                                      </div>
                                      @enderror
                                  </div>
                                  <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text bg-info text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                      </div>
                                      <input type="password" value="{{ old('password')}}" name="password" class="form-control form-control-lg" placeholder=" Masukkan Password" aria-label="Password" aria-describedby="basic-addon1" required>
                                      @error('password')
                                       <div class="invalid-feedback">
                                      {{ $message }}
                                      </div>
                                       @enderror
                                  </div>
                                  <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text bg-info text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                      </div>
                                      <input type="number" value="{{ old ('telp')}}" name="telp" class="form-control form-control-lg" placeholder="No. Telp" aria-label="Password" aria-describedby="basic-addon1" required>
                                      @error('telp')
                                       <div class="invalid-feedback">
                                      {{ $message }}
                                      </div>
                                       @enderror
                                  </div>
                              </div>
                          </div>
                          <div class="row border-top border-secondary">
                              <div class="col-12">
                                  <div class="form-group">
                                      <div class="p-t-20">
                                          <button class="btn btn-block btn-lg btn-info" type="submit">DAFTAR</button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                    </form> --}}

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

