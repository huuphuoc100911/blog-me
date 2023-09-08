@extends('user.layouts.layout')

@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bo-links">
                        <a href="{{ route('index') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Pricing</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Pricing Section Begin -->
    <section class="pricing-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title pricing-title">
                        <h2>service & optimal price</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do<br /> eiusmod tempor
                            incididunt ut labore et dolore.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="pricing-item">
                        <div class="pi-price">
                            <h2>$99</h2>
                            <span>1 hour</span>
                        </div>
                        <div class="pi-title">
                            <h3>Basic</h3>
                        </div>
                        <div class="pi-text">
                            <ul>
                                <li>up to 30 photos</li>
                                <li>no retouched photos</li>
                                <li>no make-up</li>
                                <li>no stylist assistance</li>
                            </ul>
                            <a href="#" class="primary-btn">Get appointment</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="pricing-item">
                        <div class="pi-price">
                            <h2>$199</h2>
                            <span>2 hour</span>
                        </div>
                        <div class="pi-title">
                            <h3>Standard</h3>
                        </div>
                        <div class="pi-text">
                            <ul>
                                <li>up to 30 photos</li>
                                <li>no retouched photos</li>
                                <li>no make-up</li>
                                <li>no stylist assistance</li>
                            </ul>
                            <a href="#" class="primary-btn">Get appointment</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="pricing-item">
                        <div class="pi-price">
                            <h2>$299</h2>
                            <span>3 hour</span>
                        </div>
                        <div class="pi-title">
                            <h3>Extended</h3>
                        </div>
                        <div class="pi-text">
                            <ul>
                                <li>up to 30 photos</li>
                                <li>no retouched photos</li>
                                <li>no make-up</li>
                                <li>no stylist assistance</li>
                            </ul>
                            <a href="#" class="primary-btn">Get appointment</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="pricing-item">
                        <div class="pi-price">
                            <h2>$399</h2>
                            <span>5 hour</span>
                        </div>
                        <div class="pi-title">
                            <h3>Ultimate</h3>
                        </div>
                        <div class="pi-text">
                            <ul>
                                <li>up to 30 photos</li>
                                <li>no retouched photos</li>
                                <li>no make-up</li>
                                <li>no stylist assistance</li>
                            </ul>
                            <a href="#" class="primary-btn">Get appointment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pricing Section End -->

    <!-- Services Option Section Begin -->
    <section class="services-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>frequently asked questions</h2>
                    </div>
                </div>
            </div>
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
