@extends('user.layouts.layout')

@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bo-links">
                        <a href="{{ route('index') }}"><i class="fa fa-home"></i>{{ __('lang.home') }}</a>
                        <span>{{ __('lang.contact') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Contact Section Begin -->
    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3827.0010035576706!2d107.67970217581288!3d16.424775429820276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314198b266ffad45%3A0x56dd14d46bb4b823!2zMTU0IFbDom4gRMawxqFuZywgVGjhu6d5IEzGsMahbmcsIEjGsMahbmcgVGjhu6d5LCBUaOG7q2EgVGhpw6puIEh14bq_LCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1695216075378!5m2!1svi!2s"
            width="600" height="635" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact-text">
                        <h3>Introduce</h3>
                        <p>{{ $infoCompany->description }}</p>
                        <div class="ct-item">
                            <div class="ct-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="ct-text">
                                <h5>Address</h5>
                                <p>{{ $infoCompany->address }}</p>
                            </div>
                        </div>
                        <div class="ct-item">
                            <div class="ct-icon">
                                <i class="fa fa-mobile"></i>
                            </div>
                            <div class="ct-text">
                                <h5>Phone</h5>
                                <ul>
                                    <li>{{ $infoCompany->phone }}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="ct-item">
                            <div class="ct-icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="ct-text">
                                <h5>Email</h5>
                                <p>{{ $infoCompany->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact-form">
                        <h3>Work with Me!</h3>
                        @if (session('send_email_success'))
                            <div class="alert alert-success mx-3">
                                {{ session('send_email_success') }}
                            </div>
                        @endif
                        @if (session('send_email_fail'))
                            <div class="alert alert-danger mx-3">
                                {{ session('send_email_fail') }}
                            </div>
                        @endif
                        <form method="get" action="{{ route('send-email') }}">
                            <input type="text" placeholder="Name" name="name">
                            <input type="text" placeholder="Email" name="email">
                            <button type="submit" class="site-btn">Submit</button>
                        </form>
                        <br>
                        @if (request()->vnp_ResponseCode === '00')
                            <p>
                                <span class="alert alert-success">Thanh toán thành công</span>
                            </p>
                        @elseif( request()->vnp_ResponseCode && request()->vnp_ResponseCode !== '00')
                        <p>
                            <span class="alert alert-danger">Thanh toán thất bại</span>
                        </p>
                        @endif
                            
                        <form action="{{ route('vn-payment') }}" method="post">
                            @csrf
                            <button type="submit" class="site-btn">Thanh toán VNPay</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
@endsection
