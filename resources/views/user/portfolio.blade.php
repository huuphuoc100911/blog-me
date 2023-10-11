@extends('user.layouts.layout')

@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bo-links">
                        <a href="{{ route('index') }}"><i class="fa fa-home"></i>{{ __('lang.home') }}</a>
                        <span>{{ __('lang.portfolio') }}</span>
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
                        <h2>{{ __('lang.our_lastest_works') }}</h2>
                    </div>
                    <div class="filter-controls">
                        <ul>
                            <li class="active" data-filter="*">{{ __('lang.all') }}</li>
                            @foreach ($categories as $category)
                                <li data-filter=".{{ $category->id }}">{{ $category->title }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 p-0">
                    <div class="portfolio-filter">
                        @foreach ($medias as $key => $media)
                            <div class="pf-item set-bg {{ $media->category->id }}" data-setbg="{{ $media->imageUrl }}">
                                <a href="{{ $media->imageUrl }}" class="pf-icon image-popup"><span
                                        class="icon_plus"></span></a>
                                <div class="pf-text">
                                    <h4>{{ $media->category->title }}</h4>
                                    <span>{{ $media->title }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="load-more-btn portfolio-btn">
            {{-- <a href="#">Load More</a> --}}
        </div>
    </section>
    <!-- Portfolio Section End -->
@endsection
