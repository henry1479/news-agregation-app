<footer class="footer-area">
	@include('inc.messages')
    <!-- Main Footer Area -->
    <div class="main-footer-area">
        <div class="container">
            <div class="row">

            <!-- Footer Widget Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="footer-widget-area">
                        <!-- Footer Logo -->
                        <div class="footer-logo">
                            <a href="index.html"><img src="img/core-img/logo.png" alt=""></a>
                        </div>
                        <!-- Footer Nav -->
                        <div class="footer-nav">
                            <ul>
                                <li class="active"><a href="#">Top 10</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Funny</a></li>
                                <li><a href="#">Advertising</a></li>
                                <li><a href="#">Celebs</a></li>
                                <li><a href="#">Lifestyle</a></li>
                                <li><a href="#">Videos</a></li>
                                <li><a href="#">Travel</a></li>
                                <li><a href="#">Features</a></li>
                                <li><a href="#">Submit a video</a></li>
                                <li><a href="#">Don’tMiss</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <!-- Newsletter Widget -->
                    <div class="newsletter-widget">
                    <h4>Leave <br>your feedback</h4>
                        <form action="{{ route('feedbacks.store')}}" method="post">
                            @csrf
                            <input type="text" id ="name" name="user_name" placeholder="Name" value="{{ old('user_name')}}"/>
                            <input type="text" id="feedback" name="feedback_body" value="{!! old('feedback_body') !!}" placeholder="Leave your feedback"/>
                            <button type="submit" class="btn w-100">Send</button>
                        </form>
                    </div>
                </div>

                <!-- Footer Widget Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="footer-widget-area">
                        <!-- Widget Title -->
                        <h4 class="widget-title">Latest articles</h4>

                        <!-- Single Latest Post -->
                        <div class="single-blog-post style-2 d-flex align-items-center">
                            <div class="post-thumb">
                                <a href="#"><img src="img/bg-img/4.jpg" alt=""></a>
                            </div>
                            <div class="post-data">
                                <a href="#" class="post-title">
                                    <h6>Pellentesque mattis arcu massa, nec fringilla turpis eleifend id.</h6>
                                </a>
                                <div class="post-meta">
                                    <p class="post-date"><a href="#">7:00 AM | April 14</a></p>
                                </div>
                            </div>
                        </div>

                        <!-- Single Latest Post -->
                        <div class="single-blog-post style-2 d-flex align-items-center">
                            <div class="post-thumb">
                                <a href="#"><img src="img/bg-img/5.jpg" alt=""></a>
                            </div>
                            <div class="post-data">
                                <a href="#" class="post-title">
                                    <h6>Sed a elit euismod augue semper congue sit amet ac.</h6>
                                </a>
                                <div class="post-meta">
                                    <p class="post-date"><a href="#">7:00 AM | April 14</a></p>
                                </div>
                            </div>
                        </div>

                        <!-- Single Latest Post -->
                        <div class="single-blog-post style-2 d-flex align-items-center">
                            <div class="post-thumb">
                                <a href="#"><img src="img/bg-img/6.jpg" alt=""></a>
                            </div>
                            <div class="post-data">
                                <a href="#" class="post-title">
                                    <h6>Pellentesque mattis arcu massa, nec fringilla turpis eleifend id.</h6>
                                </a>
                                <div class="post-meta">
                                    <p class="post-date"><a href="#">7:00 AM | April 14</a></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Footer Area -->
    <div class="bottom-footer-area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <!-- Copywrite -->
                    <p><a href="#"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                </div>
            </div>
        </div>
    </div>
</footer>