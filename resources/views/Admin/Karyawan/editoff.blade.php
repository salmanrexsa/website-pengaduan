
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{assets('images/favicon.png')}}>
    <title>Edit Karyawan</title>
    <!-- Custom CSS -->
    <link href="{{assets('/libs/flot/css/float-chart.css')}} rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../../dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
  

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        {{-- <b class="logo-icon p-l-10">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="../../assets/images/logo-icon.png" alt="homepage" class="light-logo" />
                           
                        </b> --}}
                        <!--End Logo icon -->
                         <!-- Logo text -->
                        <span class="logo-text">
                             <!-- dark Logo text -->
                             <img src="../../assets/images/logo-text.png" alt="homepage" class="light-logo" />
                            
                        </span>
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="../../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->
                            
                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->
                       
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                       
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-none d-md-block">Halo, {{ Auth::guard('admin')->user()->nama_karyawan }}  <i class="fa fa-angle-down"></i></span>
                                <span class="d-block d-md-none"><i class="fa fa-plus"></i></span>   
                               </a>
                                <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                <div class="dropdown-divider"></div>
                                </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>

     
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        @if (Auth::guard('admin')->user()->level == 'admin')
                        <li class="sidebar-item {{ Request::is('Admin/Dashboard') ? 'active':''}}"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard.index') }}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                        
                        <li class="sidebar-item {{ Request::is('admin/pengaduan') ? 'active' : '' }}"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('pengaduan.index')}}" aria-expanded="false"><i class="mdi mdi-pencil"></i><span class="hide-menu">Pengaduan</span></a></li>
                        <li class="sidebar-item {{ Request::is('admin/karyawan') ? 'active' : '' }}"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('karyawan.index')}}" aria-expanded="false"><i class="mdi mdi-human"></i><span class="hide-menu">Karyawan</span></a></li>
                        
                        <li class="sidebar-item {{ Request::is('admin/laporan') ? 'active' : '' }}"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('laporan.index') }}" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Laporan</span></a>
                        </li>

                        <li class="sidebar-item {{ Request::is('admin/client') ? 'active' : '' }}"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('client.index') }}" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Client</span></a>
                        </li>

                        @elseif(Auth::guard('admin')->user()->level == 'petugas')
                        <li class="sidebar-item {{ Request::is('Admin/Dashboard') ? 'active':''}}"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard.index') }}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                        
                        <li class="sidebar-item {{ Request::is('admin/pengaduan') ? 'active' : '' }}"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('pengaduan.index')}}" aria-expanded="false"><i class="mdi mdi-pencil"></i><span class="hide-menu">Pengaduan</span></a></li>
                       
                        <li class="sidebar-item {{ Request::is('admin/laporan') ? 'active' : '' }}"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('laporan.index') }}" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Laporan</span></a>
                        </li>

                       
                        @endif
                        
                       
                        
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        
        
        {{-- ISI KONTEN ISI KONTEN ISI KONTEN ISI KONTEN --}}
      
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title"><a href="{{ route('karyawan.index') }}" class="text-primary">Data Karyawan</a>
                            <a href="#" class="text-grey">/</a>
                            <a href="#" class="text-grey">Form Edit Karyawan</a></h4>
                        <div class="ml-auto text-right">
                           
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
           {{-- LETAKKAN YIELD KONTEN DI SINI --}}
           <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            Form Edit Karyawan
                        </div>
                        <div class="card-body">
                            <form action="{{ route('karyawan.update', $karyawan->id_karyawan) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label for="nama_petugas">Nama Petugas</label>
                                    <input type="text" value="{{ $karyawan->nama_karyawan }}" name="nama_karyawan" id="nama_karyawan" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" value="{{ $karyawan->username }}" name="username" id="username" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="telp">No Telp</label>
                                    <input type="number" value="{{ $karyawan->telp }}" name="telp" id="telp" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="level">Level</label>
                                    <div class="input-group mb-3">
                                        <select name="level" id="level" class="custom-select">
                                            @if ($karyawan->level == 'admin')
                                            <option selected value="admin">Admin</option>
                                            <option value="petugas">Petugas</option>
                                            @else
                                            <option value="admin">Admin</option>
                                            <option selected value="petugas">Petugas</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-warning text-white" style="width: 100%">UPDATE</button>
                            </form>
                            @if ($karyawan->id_petugas != 1)
                            <form action="{{ route('karyawan.destroy', $karyawan->id_karyawan) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mt-2" style="width: 100%" onclick="return confirm('APAKAH YAKIN?')">HAPUS</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    @if (Session::has('notif'))
                        <div class="alert alert-danger">
                            {{ Session::get('notif') }}
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
           </div>
           
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                dexza 2023
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../../dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="../../dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="../../assets/libs/flot/excanvas.js"></script>
    <script src="../../assets/libs/flot/jquery.flot.js"></script>
    <script src="../../assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="../../assets/libs/flot/jquery.flot.time.js"></script>
    <script src="../../assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="../../assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="../../assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="../../dist/js/pages/chart/chart-page-init.js"></script>

</body>

</html>

{{-- @extends('layouts.admin') --}}

{{-- @section('header', 'Form Edit Karyawan')
    
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
    <a href="{{ route('karyawan.index') }}" class="text-primary">Data Karyawan</a>
    <a href="#" class="text-grey">/</a>
    <a href="#" class="text-grey">Form Edit Karyawan</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header">
                    Form Edit Karyawan
                </div>
                <div class="card-body">
                    <form action="{{ route('karyawan.update', $karyawan->id_karyawan) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="nama_petugas">Nama Petugas</label>
                            <input type="text" value="{{ $karyawan->nama_karyawan }}" name="nama_karyawan" id="nama_karyawan" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" value="{{ $karyawan->username }}" name="username" id="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="telp">No Telp</label>
                            <input type="number" value="{{ $karyawan->telp }}" name="telp" id="telp" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="level">Level</label>
                            <div class="input-group mb-3">
                                <select name="level" id="level" class="custom-select">
                                    @if ($karyawan->level == 'admin')
                                    <option selected value="admin">Admin</option>
                                    <option value="petugas">Petugas</option>
                                    @else
                                    <option value="admin">Admin</option>
                                    <option selected value="petugas">Petugas</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning text-white" style="width: 100%">UPDATE</button>
                    </form>
                    @if ($karyawan->id_petugas != 1)
                    <form action="{{ route('karyawan.destroy', $karyawan->id_karyawan) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mt-2" style="width: 100%" onclick="return confirm('APAKAH YAKIN?')">HAPUS</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12">
            @if (Session::has('notif'))
                <div class="alert alert-danger">
                    {{ Session::get('notif') }}
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
 --}}
