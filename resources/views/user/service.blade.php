@extends('user.layouts.layout')

@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bo-links">
                        <a href="{{ route('index') }}"><i class="fa fa-home"></i>{{ __('lang.home') }}</a>
                        <span>{{ __('lang.service') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Services Section Begin -->
    <section class="services-section services-normal spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="services-item">
                        <img src="/assets/user/img/services/service-1.jpg" alt="">
                        <h3>Shooting</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="services-item">
                        <img src="/assets/user/img/services/service-2.jpg" alt="">
                        <h3>Videos</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="services-item">
                        <img src="/assets/user/img/services/service-3.jpg" alt="">
                        <h3>Editing</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

    <!-- Services Option Section Begin -->
    <section class="services-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="so-item">
                        <div class="so-title">
                            <div class="so-number">01</div>
                            <h5>Filming and Editing</h5>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                    </div>
                    <div class="so-item">
                        <div class="so-title">
                            <div class="so-number">02</div>
                            <h5>Engagement photography</h5>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                    </div>
                    <div class="so-item">
                        <div class="so-title">
                            <div class="so-number">03</div>
                            <h5>Comercial photography</h5>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="so-item">
                        <div class="so-title">
                            <div class="so-number">04</div>
                            <h5>Social media photography</h5>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                    </div>
                    <div class="so-item">
                        <div class="so-title">
                            <div class="so-number">02</div>
                            <h5>Event Photography</h5>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                    </div>
                    <div class="so-item">
                        <div class="so-title">
                            <div class="so-number">03</div>
                            <h5>personal photography</h5>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Option Section End -->
@endsection
