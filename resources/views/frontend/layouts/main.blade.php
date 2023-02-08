<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CV. DEN LOGISTICS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="https://ik.imagekit.io/dxofqajmq/Tugas_Akhir/Group_357_xY74eSQs2.png?ik-sdk-version=javascript-1.4.3&updatedAt=1675895666871" rel="icon" type="image/x-icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark">
        <div class="row py-2 px-lg-5">
            <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center text-white">
                    <small><i class="fa fa-phone-alt mr-2"></i>031 3573457</small>
                    <small class="px-3">|</small>
                    <small><i class="fa fa-envelope mr-2"></i>denlogistik@gmail.com</small>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-white px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-white pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    @include('frontend.layouts.navbar')

    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid mb-5">
        <div class="container text-center py-5">
            <h1 class="text-primary mb-4">Safe & Faster</h1>
            <h1 class="text-white display-3 mb-5">Logistics Services</h1>
            <div class="mx-auto" style="">
                <form action="{{ route('front.store') }}" method="POST">
                    <div class="input-group">
                        @csrf
                        <input type="text" class="form-control border-light" name="keyword" style="padding: 30px;"
                            placeholder="Masukkan Kode Pesanan" value="{{ old('keyword') }}">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary px-3">Track & Trace</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- Header End -->

    @yield('content')

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5"
        style="border-color: #3E3E4E !important;">
        <div class="row">
            <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white">&copy; <a href="{{ route('home.index') }}">DEN LOGISTICS</a>. All Rights
                    Reserved.
                </p>
            </div>
            <div class="col-lg-6 text-center text-md-right">
                <p class="m-0 text-white"><a href="{{ route('home.index') }}"><strong>CV. DEN LOGISTICS</strong></a>
                    <br>
                    Ko Ruko Pengampon Square Blok E No.28, Bongkaran, Pabean Cantikan <br>
                    Surabaya City, East Java 60161
                </p>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontendlib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('frontendlib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('frontendlib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('frontendlib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('frontend/mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('frontend/mail/contact.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
