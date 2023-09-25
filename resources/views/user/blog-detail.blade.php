@extends('user.layouts.layout')
@push('styles')
    <style>
        ul {
            list-style-type: none;
        }

        .comments-container {
            margin: 60px auto 15px;
            width: 768px;
        }

        .comments-container h1 {
            font-size: 36px;
            color: #283035;
            font-weight: 400;
        }

        .comments-container h1 a {
            font-size: 18px;
            font-weight: 700;
        }

        .comments-list {
            margin-top: 30px;
            position: relative;
        }

        .comments-list:before {
            content: '';
            width: 2px;
            height: 100%;
            background: #c7cacb;
            position: absolute;
            left: 32px;
            top: 0;
        }

        .comments-list:after {
            content: '';
            position: absolute;
            background: #c7cacb;
            bottom: 0;
            left: 27px;
            width: 7px;
            height: 7px;
            border: 3px solid #dee1e3;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
        }

        .reply-list:before,
        .reply-list:after {
            display: none;
        }

        .reply-list li:before {
            content: '';
            width: 60px;
            height: 2px;
            background: #c7cacb;
            position: absolute;
            top: 25px;
            left: -55px;
        }


        .comments-list li {
            margin-bottom: 15px;
            display: block;
            position: relative;
        }

        .comments-list li:after {
            content: '';
            display: block;
            clear: both;
            height: 0;
            width: 0;
        }

        .reply-list {
            padding-left: 88px;
            clear: both;
            margin-top: 15px;
        }

        .comments-list .comment-avatar {
            width: 65px;
            height: 65px;
            position: relative;
            z-index: 99;
            float: left;
            border: 3px solid #FFF;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
            -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .comments-list .comment-avatar img {
            width: 100%;
            height: 100%;
        }

        .reply-list .comment-avatar {
            width: 50px;
            height: 50px;
        }

        .comment-main-level:after {
            content: '';
            width: 0;
            height: 0;
            display: block;
            clear: both;
        }

        .comments-list .comment-box {
            width: 680px;
            float: right;
            position: relative;
            -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
            -moz-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
        }

        .comments-list .comment-box:before,
        .comments-list .comment-box:after {
            content: '';
            height: 0;
            width: 0;
            position: absolute;
            display: block;
            border-width: 10px 12px 10px 0;
            border-style: solid;
            border-color: transparent #FCFCFC;
            top: 8px;
            left: -11px;
        }

        .comments-list .comment-box:before {
            border-width: 11px 13px 11px 0;
            border-color: transparent rgba(0, 0, 0, 0.05);
            left: -12px;
        }

        .reply-list .comment-box {
            width: 610px;
        }

        .comment-box .comment-head {
            background: #FCFCFC;
            padding: 10px 12px;
            border-bottom: 1px solid #E5E5E5;
            overflow: hidden;
            -webkit-border-radius: 4px 4px 0 0;
            -moz-border-radius: 4px 4px 0 0;
            border-radius: 4px 4px 0 0;
        }

        .comment-box .comment-head i {
            float: right;
            margin-left: 14px;
            position: relative;
            top: 2px;
            color: #A6A6A6;
            cursor: pointer;
            -webkit-transition: color 0.3s ease;
            -o-transition: color 0.3s ease;
            transition: color 0.3s ease;
        }

        .comment-box .comment-head i:hover {
            color: #03658c;
        }

        .comment-box .comment-name {
            color: #283035;
            font-size: 14px;
            font-weight: 700;
            float: left;
            margin-right: 10px;
        }

        .comment-box .comment-name a {
            color: #283035;
        }

        .comment-box .comment-head span {
            float: left;
            color: #999;
            font-size: 13px;
            position: relative;
            top: 1px;
        }

        .comment-box .comment-content {
            background: #FFF;
            padding: 12px;
            font-size: 15px;
            color: #595959;
            -webkit-border-radius: 0 0 4px 4px;
            -moz-border-radius: 0 0 4px 4px;
            border-radius: 0 0 4px 4px;
        }

        .comment-box .comment-name.by-author,
        .comment-box .comment-name.by-author a {
            color: #03658c;
        }

        .comment-box .comment-name.by-author:after {
            content: 'autor';
            background: #03658c;
            color: #FFF;
            font-size: 12px;
            padding: 3px 5px;
            font-weight: 700;
            margin-left: 10px;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
        }

        /** =====================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    * Responsive
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ========================*/
        @media only screen and (max-width: 766px) {
            .comments-container {
                width: 480px;
            }

            .comments-list .comment-box {
                width: 390px;
            }

            .reply-list .comment-box {
                width: 320px;
            }
        }
    </style>
@endpush

@section('content')
    <!-- Blog Details Section Begin -->
    <div class="blog-hero set-bg" data-setbg="{{ $blogDetail->image_url }}"></div>
    <section class="blog-details-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-details-text" style="border-right: 1px solid #ebebeb; border-left: 1px solid #ebebeb">
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
                                            <div class="label">{{ $blog->blogCategory->title }}</div>
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
                        <div class="comments-container">
                            <h1>Comments</h1>

                            <ul id="comments-list" class="comments-list">
                                <li>
                                    <div class="comment-main-level">

                                        <div class="comment-avatar"><img
                                                src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg"
                                                alt=""></div>

                                        <div class="comment-box">
                                            <div class="comment-head">
                                                <h6 class="comment-name by-author"><a href="#">Agustin Ortiz</a>
                                                </h6>
                                                <span>20 minutes ago</span>
                                                <i class="fa fa-reply"></i>
                                                <i class="fa fa-heart"></i>
                                            </div>
                                            <div class="comment-content">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi
                                                et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                                            </div>
                                        </div>
                                    </div>

                                    <ul class="comments-list reply-list">
                                        <li>

                                            <div class="comment-avatar"><img
                                                    src="http://i9.photobucket.com/albums/a88/creaticode/avatar_2_zps7de12f8b.jpg"
                                                    alt=""></div>

                                            <div class="comment-box">
                                                <div class="comment-head">
                                                    <h6 class="comment-name"><a href="#">Lorena Rojero</a></h6>
                                                    <span>10 minutes ago</span>
                                                    <i class="fa fa-reply"></i>
                                                    <i class="fa fa-heart"></i>
                                                </div>
                                                <div class="comment-content">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis
                                                    animi et iure laudantium vitae, praesentium optio, sapiente distinctio
                                                    illo?
                                                </div>
                                            </div>
                                        </li>

                                        <li>

                                            <div class="comment-avatar"><img
                                                    src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg"
                                                    alt=""></div>

                                            <div class="comment-box">
                                                <div class="comment-head">
                                                    <h6 class="comment-name by-author"><a href="#">Agustin Ortiz</a>
                                                    </h6>
                                                    <span>10 minutes ago</span>
                                                    <i class="fa fa-reply"></i>
                                                    <i class="fa fa-heart"></i>
                                                </div>
                                                <div class="comment-content">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis
                                                    animi et iure laudantium vitae, praesentium optio, sapiente distinctio
                                                    illo?
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <div class="comment-main-level">
                                        <div class="comment-avatar"><img
                                                src="http://i9.photobucket.com/albums/a88/creaticode/avatar_2_zps7de12f8b.jpg"
                                                alt=""></div>
                                        <div class="comment-box">
                                            <div class="comment-head">
                                                <h6 class="comment-name"><a href="#">Lorena Rojero</a></h6>
                                                <span>10 minutes ago</span>
                                                <i class="fa fa-reply"></i>
                                                <i class="fa fa-heart"></i>
                                            </div>
                                            <div class="comment-content">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi
                                                et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="comment-main-level">
                                        <div class="comment-avatar"><img
                                                src="http://i9.photobucket.com/albums/a88/creaticode/avatar_2_zps7de12f8b.jpg"
                                                alt=""></div>
                                        <div class="comment-box">
                                            <div class="comment-head">
                                                <h6 class="comment-name">Lorena Rojero</h6>
                                                <span>10 minutes ago</span>
                                                <i class="fa fa-reply"></i>
                                                <i class="fa fa-heart"></i>
                                            </div>
                                            <div class="comment-content">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi
                                                et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="d-flex flex-row add-comment-section mt-4 mb-4">
                                @if (auth('user')->user())
                                    <img class="img-fluid img-responsive rounded-circle mr-2"
                                        src="{{ auth('user')->user()->image_url }}" width="38">
                                    <input type="text" name="comment" class="form-control mr-3"
                                        placeholder="Add comment">
                                    <button class="btn btn-primary" onclick="handleBlogComment({{ $blogDetail->id }})"
                                        type="button">Comment</button>
                                @else
                                    <img class="img-fluid img-responsive rounded-circle mr-2"
                                        src="https://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg"
                                        width="38">
                                    <input type="text" name="comment" class="form-control mr-3"
                                        placeholder="Add comment">
                                    <button class="btn btn-primary" onclick="handleAlertLogin()"
                                        type="button">Comment</button>
                                @endif

                            </div>
                            <div>
                                <span class="ml-5 text-danger hidden alert-comment">Ban chua nhap binh luan</span>
                                <span class="ml-5 text-danger hidden alert-login">Ban can phai dang nhap</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="bs-toast toast toast-placement-ex m-2 fade bg-danger top-0 end-0 hide" role="alert"
        aria-live="assertive" aria-atomic="true" data-delay="2000">
        <div class="toast-header">
            <i class="bx bx-bell me-2"></i>
            <div class="me-auto fw-semibold">Cảnh báo</div>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body"><strong>Không thực hiện được!</strong> Bạn không phải là người tạo danh mục blog.
        </div>
    </div>
    <div id="showToastPlacement"></div>
    <!-- Blog Details Section End -->
@endsection
@push('scripts')
    <script src="/assets/admin/assets/js/ui-toasts.js"></script>
    <script>
        function handleBlogComment(blogId) {
            if ($("input[name='comment']").val() === '') {
                $(".alert-comment").removeClass('hidden');
            } else {
                $(".alert-comment").addClass('hidden');
                $.ajax({
                    url: "{{ route('blog-comment') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        blogId: blogId,
                        comment: $("input[name='comment']").val()
                    },
                    success: function(data) {
                        $('#comments-list').append(data.comment);
                        $("input[name='comment']").val('');
                    }
                });
            }
        }

        function handleAlertLogin() {
            $(".alert-login").removeClass('hidden');
        }
    </script>
@endpush
