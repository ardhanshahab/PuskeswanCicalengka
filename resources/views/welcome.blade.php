<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puskeswan Cicalengka</title>
    <link rel="stylesheet" href="{{ asset('assets//libs/OwlCarousel-2/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/iconfont/tabler-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
    <!------------------------------>
    <!-- Header Start -->
    <!------------------------------>
    <header class="main-header position-fixed w-100 ">
        <div class="container">
            <nav class="navbar navbar-expand-xl py-0">
                <div class="d-flex w-100 justify-content-between align-items-center">
                    <div class="logo">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0f/Lambang_Kabupaten_Bandung%2C_Jawa_Barat%2C_Indonesia.svg/600px-Lambang_Kabupaten_Bandung%2C_Jawa_Barat%2C_Indonesia.svg.png" alt="Logo" width="90px" class="p-1">
                        <a class="navbar-brand py-0 me-0 text-white" href="#">Puskeswan Cicalengka</a>
                    </div>
                    {{-- <a class="d-inli   ne-block d-lg-block d-xl-none d-xxl-none nav-toggler text-decoration-none" data-bs-toggle="offcanvas" href="#offcanvasExample" aria-controls="offcanvasExample">
                        <i class="ti ti-menu-2 text-warning"></i>
                    </a> --}}
                    <div class="d-flex ms-auto align-items-center">
                        <a class="btn btn-warning btn-hover-secondery text-capitalize m-2" href="/login">Login</a>
                        <a class="btn btn-warning btn-hover-secondery text-capitalize m-2" href="/register">Register</a>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!------------------------------>
     <!-- Header End  -->
    <!------------------------------>

    <!------------------------------>
    <!--- Hero Banner Start--------->
    <!------------------------------>
    <section class="hero-banner position-relative overflow-hidden">
        <div class="container-fluid">
            <div class="row d-flex flex-wrap align-items-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="position-relative left-hero-color px-4" >
                        <h4 class="mb-0 fw-bold">
                            Jadwal Puskeswan Cicalengka
                        </h4>
                        @foreach($schedules as $schedule)
                        <ul>
                            @if($schedule->is_holiday)
                                <li class="m-0 p-4">{{ $schedule->day }} - Libur</li>
                            @else
                                <li class="m-0 p-4">{{ $schedule->day }} {{ $schedule->keterangan }} mulai dari jam {{ $schedule->start_time }} s/d {{ $schedule->end_time }}</li>
                            @endif
                        </ul>

                        {{-- <a href="{{ route('schedules.edit', $schedule->id) }}">Edit</a> --}}
                        @endforeach
                        <a href="/antrian/create" class="btn btn-warning btn-hover-secondery"><span class="d-inline-block me-2"><i class="ti ti-playstation-triangle"></i></span> Daftar Pemeriksaan</a>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="position-relative right-hero-color">
                        <img src="../assets/images/hero/hero.svg" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="footer-logo-col">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0f/Lambang_Kabupaten_Bandung%2C_Jawa_Barat%2C_Indonesia.svg/600px-Lambang_Kabupaten_Bandung%2C_Jawa_Barat%2C_Indonesia.svg.png" alt="Logo" width="100px">

                        <a href="#" class="text-white text-decoration-none">Puskeswan Cicalengka</a>
                        <p class="blue-light mb-0 fs-7 fw-500">Jadwal sewaktu-waktu bisa berubah dikarenakan kegiatan lapangan dan kegiatan kedinasan lainnya</p>
                        <div class="callus text-white fw-500 fs-7">
                            Whatsapp
                            <div class="blue-light"><a href="#" class="text-warning fw-500 fs-7 text-decoration-none">808-956-9599</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <h5 class="text-white">Note</h5>
                    <ul class="list-unstyled mb-0 pl-0">
                        <li><a href="#">Hanya 15 antrian/hari</a></li>
                        <li><a href="#">Dimulai pukul 07.00</a></li>
                        <li><a href="#">Tidak melayani konsultasi online</a></li>
                        <li><a href="#">Pemilik dapat membawa hewan maks 2 ekor</a></li>
                    </ul>
                </div>
            </div>
            <div class="copyrights text-center blue-light  fw-500">@<span id="autodate">2023</span> - All Rights Reserved by <a href="https://adminmart.com/" class="blue-light text-decoration-none">adminmart.com</a> Dsitributed By <a href="https://themewagon.com" class="blue-light text-decoration-none">ThemeWagon</a></div>
        </div>
    </footer>
    <!------------------------------>
    <!-------Footer End------------->
    <!------------------------------>


    <script src="{{ asset('assets/dist/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/assets/libs/OwlCarousel-2/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/custom.js')}}"></script>
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> --}}

</body>
</html>
