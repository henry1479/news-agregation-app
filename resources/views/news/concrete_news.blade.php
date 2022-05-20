@extends('index')
@section('content')

<div class="single-blog-post-details">
    <div class="post-thumb">
        <img src="{{ asset('img/bg-img/')}}/{{ $news['id']+6}}.jpg" alt="">
    </div>
    <div class="post-data">
        <a href="#" class="post-catagory">{{ $category }}</a>
        <h2 class="post-title">{{ $news['title'] }}</h2>
        <div class="post-meta">
            <!-- Post Details Meta Data -->
            <div class="post-details-meta-data mb-50 d-flex align-items-center justify-content-between">
                <!-- Post Author & Date -->
                <div class="post-authors-date">
                    <p class="post-author">By <a href="#">{{ $news['author'] }}</a></p>
                    <p class="post-date">{{ $news['created_at'] }}</p>
                </div>
                <!-- View Comments -->
                <div class="view-comments">
                    <p class="views"><?=rand(1,5000)?> Views</p>
                    <a href="#comments" class="comments"><?=rand(0,100)?> comments</a>
                </div>
            </div>

            <p>{{ $news['description'] }}</p>
        </div>
    </div>
    <div class="login-with-facebook my-5">
        <a href="{{ route('categories')}}/{{$category}}">Back to news</a>
    </div>
</div>
@endsection('content')