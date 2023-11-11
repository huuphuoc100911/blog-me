    <!-- Footer Section Begin -->
    @php
        $infoCompany = \App\Models\InfoCompany::findOrFail(1);
    @endphp
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="fs-about">
                        <div class="fa-logo">
                            <a href="#">
                                <img src="/assets/user/img/f-logo.png" alt="">
                            </a>
                        </div>
                        <p>{{ $infoCompany->description }}</p>
                        <div class="fa-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="fs-widget">
                        <h5>{{ __('lang.quick_link') }}</h5>
                        <ul>
                            <li><a href="{{ route('index') }}">{{ __('lang.home') }}</a></li>
                            <li><a href="{{ route('about') }}">{{ __('lang.about') }}</a></li>
                            <li><a href="{{ route('contact') }}">{{ __('lang.contact') }}</a></li>
                        </ul>
                        <ul>
                            <li><a href="{{ route('pricing') }}">{{ __('lang.pricing') }}</a></li>
                            <li><a href="{{ route('portfolio') }}">{{ __('lang.portfolio') }}</a></li>
                            <li><a href="{{ route('service') }}">{{ __('lang.service') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="copyright-text">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i
                                class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
                                target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- Js Plugins -->
    <script src="/assets/user/js/jquery-3.3.1.min.js"></script>
    <script src="/assets/user/js/bootstrap.min.js"></script>
    <script src="/assets/user/js/jquery.magnific-popup.min.js"></script>
    <script src="/assets/user/js/isotope.pkgd.min.js"></script>
    <script src="/assets/user/js/masonry.pkgd.min.js"></script>
    <script src="/assets/user/js/jquery.slicknav.js"></script>
    <script src="/assets/user/js/owl.carousel.min.js"></script>
    <script src="/assets/user/js/main.js"></script>
    <script src="/assets/staff/assets/modules/jquery.min.js"></script>
    @stack('scripts')
    </body>

    </html>
