@extends('user.layouts.layout')

@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bo-links">
                        <a href="{{ route('index') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Contact</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Contact Section Begin -->
    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19895.796147709065!2d-0.07089430178187445!3d51.44026184657587!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487603c1647410e9%3A0x1bb92367ed35de98!2sForest%20Hill%2C%20London%2C%20UK!5e0!3m2!1sen!2sbd!4v1584297571592!5m2!1sen!2sbd"
            height="635" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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
                        <form action="#">
                            <input type="text" placeholder="Name">
                            <input type="text" placeholder="Email">
                            <input type="text" placeholder="Website">
                            <textarea placeholder="Message"></textarea>
                            <button type="submit" class="site-btn">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
@endsection
