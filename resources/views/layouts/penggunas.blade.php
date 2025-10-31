<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        
    @yield('css')

    <style>
        .btn-purple {
            background: #6a70fc;
            border: 1px solid #6a70fc;
            color: #fff;
        }

        .btn-purple:hover {
            background: #6a70fc;
            border: 1px solid #6a70fc;
            color: #fff;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    
</head>

<body>

    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3 class="mb-0">DEXZA</h3>
                <p class="text-white mb-0">Pengaduan</p>
            </div>

            <ul class="list-unstyled components">

                <li class="{{ Request::is('User/Dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                </li>
            
        
                <li class="{{ Request::is('User/Laporan') ? 'active' : '' }}">
                    <a href="{{ route('user.laporan') }}">Pengaduan</a>
                </li>

                <li class="{{ Request::is('User/Keterangan') ? 'active' : '' }}">
                    <a href="{{ route('keterangan') }}">Keterangan</a>
                </li>

                

                <li class="{{ Request::is('User/laporans') ? 'active' : '' }}">
                    <a href="{{ route('profil') }}">Profil</a>
                </li>

                
            </ul>
        </nav>


        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    <div class="ml-2">@yield('header')</div>
                    {{-- nav anyar  --}}
             
                      

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav text-center ml-auto">
                            {{-- <a href="{{ route('admin.logout') }}" class="btn btn-white btn-sm">{{ Auth::guard('admin')->user()->nama_petugas }}</a> --}}
                            {{-- <a href="{{ route('pekat.logout') }}" class="btn btn-white btn-sm">{{ Auth::guard('client')->user()->nama }}</a>
                        </ul> --}}

                        {{-- <ul class="nav navbar-nav text-center ml-auto"> --}}
                            {{-- <a href="{{ route('pekat.laporan') }}" class="btn btn-white btn-sm">Laporan</a>
                        </ul> --}}
                        <nav id="navbar-example2" class="navbar navbar-light bg-light">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">{{ Auth::guard('client')->user()->nama }}</a>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="#one">Profil saya</a>
                              <div role="separator" class="dropdown-divider"></div>
                              <a class="dropdown-item" href="{{ route('pekat.logout') }}">Log out</a>
                            </div>
                        </li>
                        </nav>
                        
                        </ul>

                    </div>
                </div>
            </nav>
            @yield('content')
        </div>
    </div>

    {{-- @section('content')
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">Petugas</div>
                <div class="card-body">
                    <div class="text-center">
                        {{-- {{ $petugas }} --}}
                    {{-- </div>
                </div>
            </div>
        </div> --}} 

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });

    </script>

    @yield('js')
    </body>

</html>
