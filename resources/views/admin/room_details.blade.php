<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <base href="/public">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Hotel</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/gijgo.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> --}}
</head>

<body>

    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <strong>Hotel</b>
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->

    <header>
        <!-- Header Start -->
        <div class="header-area header-sticky">
            <div class="main-header ">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- logo -->
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="/"><img src="assets/images/Logo2-removebg.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8">
                            <!-- main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="/">Home</a></li>
                                        <li><a href="{{ route('about') }}">About</a></li>
                                        {{-- <li><a href="services.html">Service</a></li> --}}
                                        <li><a href="{{ route('hotel_gallary') }}">Gallery</a>
                                        </li>
                                        <li><a href="{{ route('rooms') }}">Rooms</a>
                                        </li>
                                        <li><a href="{{ route('contact') }}">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2">
                            <!-- header-btn -->
                            <div class="header-btn">

                                @auth
                                    @php
                                        $name = Auth::user()->name;
                                        $name = explode(' ', $name);
                                    @endphp
                                @endauth
                                <a>
                                    @if (Route::has('login'))
                                        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10" id="qqq" ;>
                                            @auth
                                                <a class="btn3" style="margin: 0.5px;" href="{{ url('/dashboard') }}"
                                                    class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                                    <p style="color: white; margin-top: 10px;">{{ $name[0] }}</p>
                                                </a>
                                                <form action="{{ route('logout') }}" method="POST">
                                                    @csrf
                                                    @method('POST')
                                                    <button style="border: none; background-color: transparent;"
                                                        @click.prevent="$root.submit();">
                                                        <a class="btn3 ">
                                                            <p style="color: white; margin-top: 10px;">Logout</p>
                                                        </a>
                                                    </button>
                                                </form>
                                            @else
                                                <a class="btn d-none d-lg-block " href="{{ route('login') }}"
                                                    class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                                                    in</a>
                                                <span style="color: transparent">0</span>

                                                @if (Route::has('register'))
                                                    <a class="btn d-none d-lg-block " href="{{ route('register') }}"
                                                        class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                                @endif
                                            @endauth
                                        </div>
                                    @endif
                                </a>

                                <!-- <a href="#" class="btn btn1 d-none d-lg-block ">Login</a>
                                <a href="#" class="btn btn1 d-none d-lg-block ">Register</a> -->
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    <main>

        <!-- slider Area Start-->
        <div class="slider-area">
            <div class="single-slider hero-overly slider-height2 d-flex align-items-center"
                data-background="assets/img/hero/roomspage_hero.jpg">
                <div class="container">
                    <div class="row ">
                        <div class="col-md-11 offset-xl-1 offset-lg-1 offset-md-1">
                            <div class="hero-caption">
                                <span>Rooms</span>
                                <h2>Our Rooms</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->

        <!-- Room Start -->
        <section class="room-area r-padding1" style="background-color: rgb(240, 252, 255)">
            <div class="container">
                {{-- <div class="row justify-content-center">
                    <div class="col-xl-8">
                        <!--font-back-tittle  -->
                        <div class="font-back-tittle mb-45">
                            <div class="archivment-front">
                                <h3>Our Rooms</h3>
                            </div>
                            <h3 class="archivment-back">Our Rooms</h3>
                        </div>
                    </div>
                </div> --}}
                <div class="rowcus">

                    <div class="col-xl-8">
                        <!-- Single Room -->
                        <div class="single-room mb-50">
                            <div class="room-img">
                                <img style="size: 50%" src="{{ 'uploadedRooms/' . $room->image }}" alt="">
                            </div>
                            <div class="room-caption" style="text-align: center; background: rgba(255, 237, 211, 0.885)">
                                <h2>{{ $room->room_title }}</h2>
                                <p style="padding: 12px">{{ $room->description }}</p>
                                <h4 style="padding: 12px">Free WIFI : {{ $room->wifi }}</h4>
                                <h4 style="padding: 12px">Room Type : {{ $room->room_type }}</h4>
                                <h3 style="padding: 12px">Price LKR : {{ $room->price }}</h3>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="card-title">Book Room</h1>

                                <div>
                                    @if (Session()->has('message'))
                                        <div class="alert alert-success">
                                            <button type="button" class="close" data-bs-dismiss="alert">X</button>
                                            {{ session()->get('message') }}
                                        </div>
                                    @endif
                                </div>

                                <div>
                                    @if (Session()->has('error'))
                                        <div class="alert alert-danger">
                                            <button type="button" class="close" data-bs-dismiss="alert">X</button>
                                            {{ session()->get('error') }}
                                        </div>
                                    @endif
                                </div>

                                @if ($errors)

                                    @foreach ($errors->all() as $errors)
                                        <li style="color: red">{{ $errors }}</li>
                                    @endforeach

                                @endif

                                <form action="{{ url('room_booking', $room->id) }}" method="POST"
                                    class="forms-sample">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" class="form-control"
                                                placeholder="Name"
                                                @if (Auth::id()) value="{{ Auth::user()->name }}" @endif>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Email"
                                                @if (Auth::id()) value="{{ Auth::user()->email }}" @endif>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Mobile</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="phone" class="form-control"
                                                placeholder="Mobile number">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">check_in</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="check_in" class="form-control"
                                                id="check_in">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">check_out</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="check_out" class="form-control"
                                                id="check_out">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <input type="submit" class="btn btn-success" value="Book Room">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Room End -->

    </main>

    <footer>
        <!-- Footer Start-->
        <div class="footer-area black-bg footer-padding">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-30">
                            <!-- logo -->
                            <div class="footer-logo">
                                <a href="index.html"><img src="assets/images/Logo2.png" style="border-radius: 5%;"
                                        alt=""></a>
                            </div>
                            <div class="footer-social footer-social2">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
                                <a href="#"><i class="fab fa-whatsapp"></i></a>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-5">
                        <div class="single-footer-caption mb-30">
                            <div class="footer-tittle">
                                <h4>Quick Links</h4>
                                <ul>
                                    <li><a href="#">About Seabed</a></li>
                                    <li><a href="#">Our Best Rooms</a></li>
                                    <li><a href="#">Our Photo Gellary</a></li>
                                    <li><a href="#">Pool Service</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                        <div class="single-footer-caption mb-30">
                            <div class="footer-tittle">
                                <h4>Reservations</h4>
                                <ul>
                                    <li><a href="#">Tel: 0817 123 880</a></li>
                                    <li><a href="#">Skype: Seabedbooking</a></li>
                                    <li><a href="#">reservations@hotelseabed.com</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4  col-sm-5">
                        <div class="single-footer-caption mb-30">
                            <div class="footer-tittle">
                                <h4>Our Location</h4>
                                <ul>
                                    <li><a href="#">NO. 305 3 DIYAPALAGODA MURUTHALAWA PILIMATHALAWA,</a></li>
                                    <li><a href="#">KANDY, SRİ LANKA</a></li>
                                </ul>
                                <!-- Form -->
                                <div class="footer-form">
                                    <div id="mc_embed_signup">
                                        <form target="_blank"
                                            action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                            method="get" class="subscribe_form relative mail_part">
                                            <input type="email" name="email" id="newsletter-form-email"
                                                placeholder="Email Address" class="placeholder hide-on-focus"
                                                onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = ' Email Address '">
                                            <div class="form-icon">
                                                <button type="submit" name="submit" id="newsletter-submit"
                                                    class="email_icon newsletter-submit button-contactForm"><img
                                                        src="assets/img/logo/form-iocn.jpg" alt=""></button>
                                            </div>
                                            <div class="mt-10 info"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p style="text-align: center;">Copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script> All rights reserved | This template is made
                with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
                    target="_blank">Akila
                    Kodithuwakku</a>
            </p>

        </div>
        <!-- Footer End-->
    </footer>

    <!-- JS here -->

    <script type="text/javascript">
        $(function() {
                var dtToday = new Date();
                var month = dtToday.getMonth() + 1;
                var day = dtToday.getDate();
                var year = dtToday.getFullYear();
                if (month < 10)
                    month = '0' + month.toString();
                if (day < 10)
                    day = '0' + day.toString();
                var maxDate = year + '-' + month + '-' + day;
                $('#check_in').attr('min', maxDate);
                $('#check_out').attr('min', maxDate);
            })

            <
            !--All JS Custom Plugins Link Here here-- >
            <
            script src = "./assets/js/vendor/modernizr-3.5.0.min.js" >
    </script>

    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <!-- Date Picker -->
    <script src="./assets/js/gijgo.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="./assets/js/jquery.scrollUp.min.js"></script>
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

</body>

</html>
