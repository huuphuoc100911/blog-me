@extends('user.layouts.layout')

@section('content')
    <!-- Blog Details Section Begin -->
    <div class="blog-hero set-bg" data-setbg="/assets/user/img/blog/details/blog-hero.jpg"></div>
    <section class="blog-details-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-details-text">
                        <div class="bd-title">
                            <div class="bt-bread">
                                <a href="{{ route('index') }}"><i class="fa fa-home"></i> Home</a>
                                <a href="./index.html">Blog</a>
                                <span>5 tips for improving low light smartphone photography</span>
                            </div>
                            <h2>5 tips for improving low light smartphone photography</h2>
                            <ul>
                                <li>by <span>Admin</span></li>
                                <li>Aug,15, 2019</li>
                                <li>20 Comment</li>
                            </ul>
                        </div>
                        <div class="bd-top-text">
                            <p>Around 40% of B2B marketers say email newsletters are one of the key features to their
                                content marketing success. There are tons of statistics that prove just how profitable
                                emails can be for your business. What the numbers don’t show is that there’s a lot of
                                testing and tweaking that goes into the email’s design and layout that allows the sender
                                to get massive rewards.</p>
                            <p>What makes a successful email or email campaign? One of the major elements in the design
                                and layout that draws people in and grows your click-through rate. Today, I’ll be
                                showing you ten examples of winning email design and how to make your own.</p>
                        </div>
                        <div class="bd-quote">
                            <p>Bringing the reader towards each CTA with “Awareness, Consideration, and Action” as the
                                main stages. Harry’s used a color block design to guide the reader through each step of
                                the email. Color blocking helps to guide the reader through your copy, making it easy to
                                read with a pleasing layout.</p>
                        </div>
                        <div class="bd-desc">
                            <p>Design: Contrasting colors like yellow and blue grab the reader’s attention, in this case
                                they also happen to be Tock’s brand colors. At the center of the email is a simple
                                illustration of the city to highlight the hustle and bustle of the life surrounding
                                restaurants. They decided to match the color of their button or designs to their brand’s
                                colors, with the help of a contrasting background color for yellow and dark blue and
                                yellow and white. Placement: Two CTAs are placed in the emailer: “Explore Tock” and
                                “Learn more.” If someone’s ready to use Tock’s services, they’re more likely to press
                                the first CTA.</p>
                        </div>
                        <div class="bd-pics">
                            <img src="/assets/user/img/blog/details/bd-1.jpg" alt="">
                            <img src="/assets/user/img/blog/details/bd-2.jpg" alt="">
                            <img src="/assets/user/img/blog/details/bd-3.jpg" alt="">
                        </div>
                        <div class="bd-last-desc">
                            <p>If they’re still in the awareness stages of getting to know the brand, then they’ll most
                                likely keep reading more on what Tock has to offer. They’re using one email design to
                                speak to two types of readers both in the first stage of their welcome email.You can
                                also change an email design’s color based on new product, season or to match a marketing
                                campaign’s new look and feel.</p>
                            <p>Design: The email imitates a product marketing funnel system, bringing the reader towards
                                each CTA with “Awareness, Consideration, and Action” as the main stages. Harry’s used a
                                color block design to guide the reader through each step of the email. Color blocking
                                helps to guide the reader through your copy, making it easy to read with a pleasing
                                layout.</p>
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
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="#" class="post-item prev-item">
                                        <h6><span class="arrow_carrot-left"></span> Previous posts</h6>
                                        <div class="pi-pic">
                                            <img src="/assets/user/img/blog/details/prev.jpg" alt="">
                                        </div>
                                        <div class="pi-text">
                                            <div class="label">Stories</div>
                                            <h5>The Best Weeknight Baked<br /> Potatoes, 3 Creative Ways</h5>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-6">
                                    <a href="#" class="post-item next-item">
                                        <h6>Next posts <span class="arrow_carrot-right"></span></h6>
                                        <div class="pi-pic">
                                            <img src="/assets/user/img/blog/details/next.jpg" alt="">
                                        </div>
                                        <div class="pi-text">
                                            <div class="label">Typography</div>
                                            <h5>The $8 French Rosé I Buy in<br /> Bulk Every Summer</h5>
                                        </div>
                                    </a>
                                </div>
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
