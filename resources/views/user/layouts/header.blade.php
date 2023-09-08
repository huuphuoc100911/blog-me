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
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

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
                            {{-- <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="./gallery.html">Gallery</a></li>
                                    <li><a href="./portfolio-details.html">Portfolio Details</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li> --}}
                            <li class="{{ \Request::segment(1) === 'contact' ? 'active' : '' }}"><a
                                    href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </nav>
                    <div class="top-search search-switch">
                        <i class="fa fa-search"></i>
                    </div>
                    <div id="mobile-menu-wrap"></div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->
