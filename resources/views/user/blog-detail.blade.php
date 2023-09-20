@extends('user.layouts.layout')

@section('content')
    <!-- Blog Details Section Begin -->
    <div class="blog-hero set-bg" data-setbg="{{ $blogDetail->image_url }}"></div>
    <section class="blog-details-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-details-text">
                        <div class="bd-title">
                            <div class="bt-bread">
                                <a href="{{ route('index') }}"><i class="fa fa-home"></i> Home</a>
                                <a href="{{ route('blog') }}">Blog</a>
                                <span>{{ $blogDetail->title }}</span>
                            </div>
                            <h2>{{ $blogDetail->title }}</h2>
                            <ul>
                                <li>by <span>{{ $blogDetail->staff->name }}</span></li>
                                <li>{{ \Carbon\Carbon::parse($blogDetail->updated_at)->format('M, d, Y') }}</li>
                                <li>20 Comment</li>
                            </ul>
                        </div>
                        <div class="bd-top-text">
                            <p>{{ $blogDetail->description }}</p>
                        </div>
                        <div class="bd-desc">
                            <p>{!! $blogDetail->content !!} </p>
                        </div>
                        <div class="bd-tag-share">
                            <div class="tags">
                                <a href="#">Typography</a>
                                <a href="#">Guides</a>
                                <a href="#">Improving</a>
                                <a href="#">Smartphone</a>
                            </div>
                            <div class="share">
                                <span>Share</span>
                                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="youtube"><i class="fa fa-youtube-play"></i></a>
                                <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="bd-related-post">
                            <h4 style="color: #111111; font-weight: 700; text-transform: uppercase; margin-bottom: 35px;">
                                Other Blog</h4>
                            <div class="row">
                                @foreach ($blogs as $blog)
                                    <a href="{{ route('blog-detail', [create_slug($blog->title), $blog->id]) }}"
                                        class="col-6 post-item prev-item my-3">
                                        <div class="pi-pic">
                                            <img src="{{ $blog->image_url }}" alt=""
                                                style="width: 135px; height: 90px;">
                                        </div>
                                        <div class="pi-text">
                                            <div class="label">{{ $blog->category->title }}</div>
                                            <p>{{ Str::limit($blog->title, 100, '...') }}</p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="bd-author">
                            <div class="avatar-pic">
                                <img src="/assets/user/img/blog/details/post-author.jpg" alt="">
                            </div>
                            <div class="avatar-text">
                                <h4>Lena Mollein</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation.</p>
                                <div class="at-social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-youtube-play"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="bd-comment-form">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h4>Comment</h4>
                                    <div class="comment-item">
                                        <div class="ci-pic">
                                            <img src="/assets/user/img/blog/details/comment/comment-1.jpg" alt="">
                                        </div>
                                        <div class="ci-text">
                                            <h5>Brandon Kelley</h5>
                                            <p>Consectetur adipiscing eiusmod tempor incididunt t labore et dolore magna
                                                aliqua. Quis ipsum suspendisse ultrices.</p>
                                            <ul>
                                                <li><i class="fa fa-clock-o"></i> Aug,15, 2019</li>
                                                <li><i class="fa fa-heart-o"></i> Like</li>
                                                <li><i class="fa fa-share-square-o"></i> Reply</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="comment-item">
                                        <div class="ci-pic">
                                            <img src="/assets/user/img/blog/details/comment/comment-2.jpg" alt="">
                                        </div>
                                        <div class="ci-text">
                                            <h5>Brandon Kelley</h5>
                                            <p>Consectetur adipiscing eiusmod tempor incididunt t labore et dolore magna
                                                aliqua. Quis ipsum suspendisse ultrices.</p>
                                            <ul>
                                                <li><i class="fa fa-clock-o"></i> Aug,15, 2019</li>
                                                <li><i class="fa fa-heart-o"></i> Like</li>
                                                <li><i class="fa fa-share-square-o"></i> Reply</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="comment-item">
                                        <div class="ci-pic">
                                            <img src="/assets/user/img/blog/details/comment/comment-3.jpg" alt="">
                                        </div>
                                        <div class="ci-text">
                                            <h5>Brandon Kelley</h5>
                                            <p>Consectetur adipiscing eiusmod tempor incididunt t labore et dolore magna
                                                aliqua. Quis ipsum suspendisse ultrices.</p>
                                            <ul>
                                                <li><i class="fa fa-clock-o"></i> Aug,15, 2019</li>
                                                <li><i class="fa fa-heart-o"></i> Like</li>
                                                <li><i class="fa fa-share-square-o"></i> Reply</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="leave-form">
                                        <h4>Leave a comment</h4>
                                        <form action="#">
                                            <input type="text" placeholder="Name">
                                            <input type="text" placeholder="Email">
                                            <input type="text" placeholder="Website">
                                            <textarea placeholder="Comment"></textarea>
                                            <button type="submit" class="site-btn">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->
@endsection
