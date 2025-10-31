
<!DOCTYPE html>
<html lang="en">
    <head>
        {{-- JO LALI ANYAR --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">


        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pengaduan Client - CV Dexza Prunama</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />

        {{-- OJO LALI ANAYR --}}
        <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


        {{-- json --}}
        <meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    </head>
    <body id="page-top">
        {{-- ajax anyar --}}
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script> --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
        </script>

        {{-- section js --}}
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

        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img src="assets/img/navbar-logo.png" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="{{ route ('loginsik') }}">LOG IN</a></li>
                        {{-- <li class="nav-item"><a class="nav-link" href="{{ route('pekat.formRegister') }}">DAFTAR</a></li>
                        </ul> --}}
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
           

            <div class="container">
                <div class="masthead-subheading">Selamat datang di</div>
                <div class="masthead-heading">Website Pengaduan</div>
                
			
                {{-- <a class="btn btn-primary btn-xl text-uppercase" href="{{ route('loginsik') }}">Tulis Laporan</a>
                <br> --}}
                <br>
                
                <form action="{{route('golekikode')}}" method="GET" id="golekiwoy" class="m-t-40">
                  

                    <div class="container"> 
                            {{-- <input id="kode_booking" placeholder="Masukkan nomor resi" name="kode_booking" type="text" class="required form-control">
                        <br> --}}
                        <input type="text" name="cari" placeholder="Cari Kode Pengaduan" value="{{ old('cari')}}">
                    
                        
                      
                 
                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">cari</button>
                    </div>
                    
                    {{-- <div class="modal fade" id="contohModal" role="dialog" arialabelledby="modalLabel" area-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
           
                               <h1>lop</h1>
                            </div>
                          </div>
                        </div>
                      </div>
                 </div>         --}}
                        
            
                </form>

               
            </div>

            <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div id="jolalihasile"></div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- script boostrap anyar --}}
            {{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> --}}
{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
        </header>
        <!-- About-->
        <section class="page-section" id="about">
            {{-- <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Alur</h2>
                    <h3 class="section-subheading text-muted">Berikut alur prosesnya</h3>
                </div> --}}
                <ul class="timeline">
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/1.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
            
                                <h4 class="subheading">Tulis Pengaduan</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Tulis Laporan keluhan anda dengan Jelas!</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/2.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="subheading">Proses Verifikasi</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Tunggu laporan anda di Verifikasi</p></div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/3.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="subheading">Tindak Lanjut</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Laporan anda sedang dalam tindak lanjut</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/4.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="subheading">Selesai</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Laporan Pengaduan Telah selesai ditindak</p></div>
                        </div>
                    </li>
                 
                </ul>
            </div>
        </section>
        <!-- Team-->
        <!-- Clients-->
        
        <!-- Contact-->
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; dexza 2023</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Portfolio Modals-->
        <!-- Portfolio item 1 modal popup-->
       <!-- Bootstrap core JS-->
    </body>
</html>
