<div class="col-12 col-lg-4">
    
    <div class="sidebar-area"> 
    <div class="newsletter-widget mb-70">
        <!-- форма для отзывов пользователей -->
        <h4>Leave <br>your feedback</h4>
       
        <form action="{{ route('feedbacks.store')}}" method="post">
            @csrf
            <input type="text" id ="name" name="user_name" placeholder="Name" value="{{ old('user_name')}}"/>
            <input type="text" id="feedback" name="feedback_body" value="{!! old('feedback_body') !!}" placeholder="Leave your feedback"/>
            <button type="submit" class="btn w-100">Send</button>
        </form>
    </div>     
        <!-- Trending Articles Widget -->
        <div class="treading-articles-widget mb-70">
            <h4>Trending Articles</h4>

            <!-- Single Trending Articles -->
            <div class="single-blog-post style-4">
                <!-- Post Thumb -->
                <div class="post-thumb">
                    <a href="#"><img src="img/bg-img/15.jpg" alt=""></a>
                    <span class="serial-number">01.</span>
                </div>
                <!-- Post Data -->
                <div class="post-data">
                    <a href="#" class="post-title">
                        <h6>This Is How Notebooks Of An Artist Who Travels Around The World Look</h6>
                    </a>
                    <div class="post-meta">
                        <p class="post-author">By <a href="#">Michael Smithson</a></p>
                    </div>
                </div>
            </div>

            <!-- Single Trending Articles -->
            <div class="single-blog-post style-4">
                <!-- Post Thumb -->
                <div class="post-thumb">
                    <a href="#"><img src="img/bg-img/16.jpg" alt=""></a>
                    <span class="serial-number">02.</span>
                </div>
                <!-- Post Data -->
                <div class="post-data">
                    <a href="#" class="post-title">
                        <h6>Artist Recreates People’s Childhood Memories With Realistic Dioramas</h6>
                    </a>
                    <div class="post-meta">
                        <p class="post-author">By <a href="#">Michael Smithson</a></p>
                    </div>
                </div>
            </div>

            <!-- Single Trending Articles -->
            <div class="single-blog-post style-4">
                <!-- Post Thumb -->
                <div class="post-thumb">
                    <a href="#"><img src="img/bg-img/17.jpg" alt=""></a>
                    <span class="serial-number">03.</span>
                </div>
                <!-- Post Data -->
                <div class="post-data">
                    <a href="#" class="post-title">
                        <h6>Artist Recreates People’s Childhood Memories With Realistic Dioramas</h6>
                    </a>
                    <div class="post-meta">
                        <p class="post-author">By <a href="#">Michael Smithson</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>