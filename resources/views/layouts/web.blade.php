<!DOCTYPE html>
<html class="loading" lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-textdirection="ltr">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ config('app.name') }}">
    <meta name="keywords" content="{{ config('app.name') }}">
    <meta name="author" content="{{ config('app.name') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @hasSection('title')
        <title>@yield('title')&nbsp;-&nbsp;{{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif
    <link rel="apple-touch-icon" href="{{ asset('') }}logo.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('') }}logo.png">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}web/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}web/assets/fonts/line-icons.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}web/assets/css/slicknav.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}web/assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}web/assets/css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}web/assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}web/assets/css/responsive.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/vendors/leaflet/leaflet.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/vendors/leaflet/control.geocoder.css">
    @stack('css')
</head>

<body>
    <header id="header-wrap">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-5 col-xs-12">
                        <ul class="list-inline">
                            <li>
                                <i class="lni-phone"></i> 0878-0823-8747
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-5 col-md-7 col-xs-12">
                        <div class="roof-social float-right">
                            <a class="facebook" href="#">
                                <i class="lni-facebook-filled"></i>
                            </a>
                            <a class="twitter" href="#">
                                <i class="lni-twitter-filled"></i>
                            </a>
                            <a class="instagram" href="#">
                                <i class="lni-instagram-filled"></i>
                            </a>
                            <a class="linkedin" href="#">
                                <i class="lni-linkedin-fill"></i>
                            </a>
                            <a class="google" href="#">
                                <i class="lni-google-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg bg-white fixed-top scrolling-navbar">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar"
                        aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        <span class="lni-menu"></span>
                        <span class="lni-menu"></span>
                        <span class="lni-menu"></span>
                    </button>
                    <a href="{{ route('index') }}" class="navbar-brand">
                        <img src="{{ asset('') }}logo.png" alt="">
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="main-navbar">
                    <ul class="navbar-nav mr-auto w-100 justify-content-center">
                        <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('index') }}">
                                Home
                            </a>
                        </li>
                        <li
                            class="nav-item {{ Request::is('produk-ikm') || Request::is('produk-ikm/*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('produk-ikm') }}">
                                Produk IKM
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('kontak') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('kontak') }}">
                                Kontak
                            </a>
                        </li>
                    </ul>
                    <div class="post-btn">
                        <a class="btn btn-common" href="{{ route('login') }}">
                            Login
                        </a>
                    </div>
                </div>
            </div>

            <ul class="mobile-menu">
                <li>
                    <a class="{{ Request::is('/') ? 'active' : '' }}" href="{{ route('index') }}">Home</a>
                </li>
                <li>
                    <a class="{{ Request::is('produk-ikm') ? 'active' : '' }}"
                        href="{{ route('produk-ikm') }}">Produk IKM</a>
                </li>
                <li>
                    <a class="{{ Request::is('kontak') ? 'active' : '' }}" href="{{ route('kontak') }}">Kontak</a>
                </li>
                <li>
                    <a href="{{ route('login') }}">Login</a>
                </li>
            </ul>
        </nav>
    </header>

    @yield('content')

    <footer>
        <section class="footer-Content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-xs-6 col-mb-12">
                        <div class="widget">
                            <div class="footer-logo"><img src="{{ asset('') }}logo.png" alt=""></div>
                            <div class="textwidget">
                                <p>
                                    DINAS PERINDUSTRIAN DAN PERDAGANGAN
                                    {{ strtoupper(pengaturan()->kabKota->nama ?? '') }}
                                </p>
                            </div>
                            <ul class="mt-3 footer-social">
                                <li><a class="facebook" href="#"><i class="lni-facebook-filled"></i></a></li>
                                <li><a class="twitter" href="#"><i class="lni-twitter-filled"></i></a></li>
                                <li><a class="linkedin" href="#"><i class="lni-linkedin-fill"></i></a></li>
                                <li><a class="google-plus" href="#"><i class="lni-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-6 col-mb-12">
                        <div class="widget">
                            <h3 class="block-title">Link</h3>
                            <ul class="menu">
                                <li><a href="{{ route('index') }}">- Home</a></li>
                                <li><a href="{{ route('produk-ikm') }}">- Produk IKM</a></li>
                                <li><a href="{{ route('kontak') }}">- Kontak</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-6 col-mb-12">
                        <div class="widget">
                            <h3 class="block-title">Kontak</h3>
                            <ul class="contact-footer">
                                <li>
                                    <strong><i class="lni-phone"></i></strong><span>0878-0823-8747</span>
                                </li>
                                <li>
                                    <strong><i class="lni-envelope"></i></strong>
                                    <span>
                                        <a href="http://preview.uideck.com/cdn-cgi/l/email-protection"
                                            class="__cf_email__"
                                            data-cfemail="88ebe7e6fce9ebfcc8e5e9e1e4a6ebe7e5">disperindag.cilegon@cilegon.go.id</a>
                                    </span>
                                </li>
                                <li>
                                    <strong><i class="lni-map-marker"></i></strong><span><a href="#">Gedung
                                            Graha Edhi Praja Lt.4 Jl. Jendral Sudirman No. 02, Ramanuju, Kec.
                                            Purwakarta, Kota Cilegon, Banten 42431</a></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <div id="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="site-info text-center">
                            <p><a target="_blank" href="{{ route('index') }}">{{ config('app.name') }}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>


    <a href="#" class="back-to-top">
        <i class="lni-chevron-up"></i>
    </a>

    <div id="preloader">
        <div class="loader" id="loader-1"></div>
    </div>

    <script src="{{ asset('') }}web/assets/js/jquery-min.js"></script>
    <script src="{{ asset('') }}web/assets/js/popper.min.js"></script>
    <script src="{{ asset('') }}web/assets/js/bootstrap.min.js"></script>
    <script src="{{ asset('') }}web/assets/js/jquery.counterup.min.js"></script>
    <script src="{{ asset('') }}web/assets/js/waypoints.min.js"></script>
    <script src="{{ asset('') }}web/assets/js/wow.js"></script>
    <script src="{{ asset('') }}web/assets/js/owl.carousel.min.js"></script>
    <script src="{{ asset('') }}web/assets/js/jquery.slicknav.js"></script>
    <script src="{{ asset('') }}web/assets/js/main.js"></script>
    <script src="{{ asset('') }}web/assets/js/form-validator.min.js"></script>
    <script src="{{ asset('') }}web/assets/js/contact-form-script.min.js"></script>
    <script src="{{ asset('') }}web/assets/js/summernote.js"></script>
    <script src="{{ asset('') }}assets/vendors/leaflet/leaflet.js"></script>
    <script src="{{ asset('') }}assets/vendors/leaflet/control.geocoder.js"></script>

    @stack('js')
</body>


</html>
