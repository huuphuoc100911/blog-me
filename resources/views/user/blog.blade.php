@extends('user.layouts.layout')

@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bo-links">
                        <a href="{{ route('index') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Blog</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Blog Section Begin -->
    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    @foreach ($blogs as $blog)
                        <div class="blog-item">
                            <div class="bi-pic">
                                <img src="{{ $blog->image_url }}" style="width: 420px; height: 280px" alt="">
                            </div>
                            <div class="bi-text">
                                <div class="label">{{ $blog->category->title }}</div>
                                <h5>
                                    <a
                                        href="{{ route('blog-detail', [create_slug($blog->title), $blog->id]) }}">{{ Str::limit($blog->title, 720, '...') }}</a>
                                </h5>
                                <ul>
                                    <li>by <span>{{ $blog->staff->name }}</span></li>
                                    <li>{{ \Carbon\Carbon::parse($blog->updated_at)->format('M, d, Y') }}</li>
                                    <li>20 Comment</li>
                                </ul>
                                <p>{{ Str::limit($blog->description, 720, '...') }}</p>
                            </div>
                        </div>
                        <hr class="pb-5">
                    @endforeach
                    <div class="blog-pagination">
                        {{ $blogs->links('vendor.pagination.custom-pagination-user') }}
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="blog-sidebar">
                        <div class="bs-item s-mb">
                            <h5>Feature posts</h5>
                            <div class="bi-feature-post">
                                <a href="#" class="fp-item">
                                    <div class="fp-pic">
                                        <img src="/assets/user/img/blog/fp-1.jpg" alt="">
                                    </div>
                                    <div class="fp-text">
                                        <h6>This Photograph Has Elderly Couples...</h6>
                                        <span>Aug,15, 2019</span>
                                    </div>
                                </a>
                                <a href="#" class="fp-item">
                                    <div class="fp-pic">
                                        <img src="/assets/user/img/blog/fp-2.jpg" alt="">
                                    </div>
                                    <div class="fp-text">
                                        <h6>Budget Gear Guide: The Best Cheap Off...</h6>
                                        <span>Aug,15, 2019</span>
                                    </div>
                                </a>
                                <a href="#" class="fp-item">
                                    <div class="fp-pic">
                                        <img src="/assets/user/img/blog/fp-3.jpg" alt="">
                                    </div>
                                    <div class="fp-text">
                                        <h6>Know Before You Go: Guide to Disney...</h6>
                                        <span>Aug,15, 2019</span>
                                    </div>
                                </a>
                                <a href="#" class="fp-item">
                                    <div class="fp-pic">
                                        <img src="/assets/user/img/blog/fp-4.jpg" alt="">
                                    </div>
                                    <div class="fp-text">
                                        <h6>Budget Gear Guide: The Best Cheap Off...</h6>
                                        <span>Aug,15, 2019</span>
                                    </div>
                                </a>
                                <a href="#" class="fp-item">
                                    <div class="fp-pic">
                                        <img src="/assets/user/img/blog/fp-5.jpg" alt="">
                                    </div>
                                    <div class="fp-text">
                                        <h6>Know Before You Go: Guide to Disney...</h6>
                                        <span>Aug,15, 2019</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="bs-item s-mb">
                            <h5>Subscribe</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor.</p>
                            <div class="bi-subscribe">
                                <form action="#">
                                    <input type="text" placeholder="Name">
                                    <input type="text" placeholder="Email">
                                    <button type="submit" class="site-btn">Subscribe</button>
                                </form>
                            </div>
                        </div>
                        <div class="bs-item">
                            <h5>Instagram</h5>
                            <div class="bi-insta">
                                <img src="/assets/user/img/blog/insta-1.jpg" alt="">
                                <img src="/assets/user/img/blog/insta-2.jpg" alt="">
                                <img src="/assets/user/img/blog/insta-3.jpg" alt="">
                                <img src="/assets/user/img/blog/insta-4.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection
