<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Phozogy Template">
    <meta name="keywords" content="Phozogy, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Phozogy | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Quantico:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="/assets/user/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/assets/user/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/assets/user/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="/assets/user/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="/assets/user/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="/assets/user/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="/assets/user/css/style.css" type="text/css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css"
        integrity="sha512-34s5cpvaNG3BknEWSuOncX28vz97bRI59UnVtEEpFX536A7BtZSJHsDyFoCl8S7Dt2TPzcrCEoHBGeM4SUBDBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @stack('styles')
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    @php
        \Carbon\Carbon::setLocale('vi');
        if (auth('user')->user()) {
            $userLogin = App\Models\User::whereId(auth('user')->user()->id)->first();
        }
    @endphp

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="logo">
                        <a href="{{ route('index') }}">
                            <img src="/assets/user/img/logo.png" alt="">
                        </a>
                    </div>
                    <nav class="nav-menu mobile-menu">
                        <ul>
                            <li class="{{ \Request::segment(1) === null ? 'active' : '' }}"><a
                                    href="{{ route('index') }}">Home</a></li>
                            <li class="{{ \Request::segment(1) === 'about' ? 'active' : '' }}"><a
                                    href="{{ route('about') }}">About</a></li>
                            <li class="{{ \Request::segment(1) === 'service' ? 'active' : '' }}"><a
                                    href="{{ route('service') }}">Services</a></li>
                            <li class="{{ \Request::segment(1) === 'pricing' ? 'active' : '' }}"><a
                                    href="{{ route('pricing') }}">Pricing</a></li>
                            <li class="{{ \Request::segment(1) === 'portfolio' ? 'active' : '' }}"><a
                                    href="{{ route('portfolio') }}">Portfolio</a></li>
                            <li class="{{ \Request::segment(1) === 'blog' ? 'active' : '' }}"><a
                                    href="{{ route('blog') }}">Blog</a></li>
                            <li class="{{ \Request::segment(1) === 'contact' ? 'active' : '' }}"><a
                                    href="{{ route('contact') }}">Contact</a></li>
                            @if (auth('user')->user())
                                <li>
                                    <a href="#" class="ci-pic">
                                        @if ($userLogin && $userLogin->image_url)
                                            <img src="{{ $userLogin->image_url }}"
                                                style="width: 40px; border-radius: 50%" alt="">
                                        @else
                                            <img src="/assets/user/img/blog/details/comment/comment-3.jpg"
                                                style="width: 40px; border-radius: 50%" alt="">
                                        @endif
                                    </a>
                                    <ul class="dropdown">
                                        <li><a href="{{ route('info-account') }}">Thông tin cá nhân</a></li>
                                        <li>
                                            <a href="#"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng
                                                xuất</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @else
                                <li><a href="#">Trang</a>
                                    <ul class="dropdown">
                                        <li><a href="{{ route('login') }}">Đăng nhập</a></li>
                                        <li><a href="{{ route('register') }}">Đăng ký</a></li>
                                    </ul>
                                </li>
                            @endif


                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->
