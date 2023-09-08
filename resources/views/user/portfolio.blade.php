@extends('user.layouts.layout')

@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bo-links">
                        <a href="{{ route('index') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Portfolio</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Portfolio Section Begin -->
    <section class="portfolio-section portfolio-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Our latest works</h2>
                    </div>
                    <div class="filter-controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".fashion">Fashion</li>
                            <li data-filter=".lifestyle">Lifestyle</li>
                            <li data-filter=".natural">Natural</li>
                            <li data-filter=".wedding">Wedding</li>
                            <li data-filter=".videos">Videos</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 p-0">
                    <div class="portfolio-filter">
                        <div class="pf-item set-bg fashion" data-setbg="/assets/user/img/portfolio/pf-1.jpg">
                            <a href="/assets/user/img/portfolio/pf-1.jpg" class="pf-icon image-popup"><span
                                    class="icon_plus"></span></a>
                            <div class="pf-text">
                                <h4>COLORS SPEAK</h4>
                                <span>Fashion</span>
                            </div>
                        </div>
                        <div class="pf-item large-width large-height set-bg lifestyle"
                            data-setbg="/assets/user/img/portfolio/pf-2.jpg">
                            <a href="/assets/user/img/portfolio/pf-2.jpg" class="pf-icon image-popup"><span
                                    class="icon_plus"></span></a>
                            <div class="pf-text">
                                <h4>COLORS SPEAK</h4>
                                <span>Fashion</span>
                            </div>
                        </div>
                        <div class="pf-item large-width set-bg natural" data-setbg="/assets/user/img/portfolio/pf-3.jpg">
                            <a href="/assets/user/img/portfolio/pf-3.jpg" class="pf-icon image-popup"><span
                                    class="icon_plus"></span></a>
                            <div class="pf-text">
                                <h4>COLORS SPEAK</h4>
                                <span>Fashion</span>
                            </div>
                        </div>
                        <div class="pf-item large-height set-bg wedding" data-setbg="/assets/user/img/portfolio/pf-4.jpg">
                            <a href="/assets/user/img/portfolio/pf-4.jpg" class="pf-icon image-popup"><span
                                    class="icon_plus"></span></a>
                            <div class="pf-text">
                                <h4>COLORS SPEAK</h4>
                                <span>Fashion</span>
                            </div>
                        </div>
                        <div class="pf-item set-bg lifestyle" data-setbg="/assets/user/img/portfolio/pf-7.jpg">
                            <a href="/assets/user/img/portfolio/pf-7.jpg" class="pf-icon image-popup"><span
                                    class="icon_plus"></span></a>
                            <div class="pf-text">
                                <h4>COLORS SPEAK</h4>
                                <span>Fashion</span>
                            </div>
                        </div>
                        <div class="pf-item set-bg natural" data-setbg="/assets/user/img/portfolio/pf-8.jpg">
                            <a href="/assets/user/img/portfolio/pf-8.jpg" class="pf-icon image-popup"><span
                                    class="icon_plus"></span></a>
                            <div class="pf-text">
                                <h4>COLORS SPEAK</h4>
                                <span>Fashion</span>
                            </div>
                        </div>
                        <div class="pf-item set-bg videos" data-setbg="/assets/user/img/portfolio/pf-5.jpg">
                            <a href="/assets/user/img/portfolio/pf-5.jpg" class="pf-icon image-popup"><span
                                    class="icon_plus"></span></a>
                            <div class="pf-text">
                                <h4>COLORS SPEAK</h4>
                                <span>Fashion</span>
                            </div>
                        </div>
                        <div class="pf-item set-bg fashion" data-setbg="/assets/user/img/portfolio/pf-6.jpg">
                            <a href="/assets/user/img/portfolio/pf-6.jpg" class="pf-icon image-popup"><span
                                    class="icon_plus"></span></a>
                            <div class="pf-text">
                                <h4>COLORS SPEAK</h4>
                                <span>Fashion</span>
                            </div>
                        </div>
                        <div class="pf-item large-width set-bg videos" data-setbg="/assets/user/img/portfolio/pf-10.jpg">
                            <a href="/assets/user/img/portfolio/pf-10.jpg" class="pf-icon image-popup"><span
                                    class="icon_plus"></span></a>
                            <div class="pf-text">
                                <h4>COLORS SPEAK</h4>
                                <span>Fashion</span>
                            </div>
                        </div>
                        <div class="pf-item set-bg fashion" data-setbg="/assets/user/img/portfolio/pf-11.jpg">
                            <a href="/assets/user/img/portfolio/pf-11.jpg" class="pf-icon image-popup"><span
                                    class="icon_plus"></span></a>
                            <div class="pf-text">
                                <h4>COLORS SPEAK</h4>
                                <span>Fashion</span>
                            </div>
                        </div>
                        <div class="pf-item large-width large-height set-bg wedding"
                            data-setbg="/assets/user/img/portfolio/pf-9.jpg">
                            <a href="/assets/user/img/portfolio/pf-9.jpg" class="pf-icon image-popup"><span
                                    class="icon_plus"></span></a>
                            <div class="pf-text">
                                <h4>COLORS SPEAK</h4>
                                <span>Fashion</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="load-more-btn portfolio-btn">
            <a href="#">Load More</a>
        </div>
    </section>
    <!-- Portfolio Section End -->
@endsection
