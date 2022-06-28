@extends('index')
@section('content')
@include('inc.messages')
<div class="single-blog-post-details">
    <div class="post-thumb">
    @if($news->image)   
        <img src= "{{ Storage::disk('upload')->url($news['image'])}}"/>
    @else 
        <img src="{{ asset('img/bg-img/')}}/<?=rand(1,24)?>.jpg" alt="{{$news->title}}">
    @endif
    </div>
    <div class="post-data">
        <a href="#" class="post-catagory">{{ $category }}</a>
        <h2 class="post-title">{{ $news->title }}</h2>
        <div class="post-meta">
            <!-- Post Details Meta Data -->
            <div class="post-details-meta-data mb-50 d-flex align-items-center justify-content-between">
                <!-- Post Author & Date -->
                <div class="post-authors-date">
                    <p class="post-author">By <a href="#">{{ $news->author }}</a></p>
                    <p class="post-date">@if($news->created_at){{ $news->created_at->format('d-m-Y')}} @endif</p>
                </div>
                <!-- View Comments -->
                <div class="view-comments">
                    <p class="views"><?=rand(1,5000)?> Views</p>
                    <a href="#comments" class="comments"><?=rand(0,100)?> comments</a>
                </div>
            </div>

            <p>{{ $news -> description }}</p>
        </div>
    </div>
    <a href="{{ route('news.edit', ['news_id'=>$news->id])}}"><h4>Edit this news</h4></a>
    <div class="login-with-facebook my-5">
        <a href="{{ route('categories')}}/{{ $category }}">Back to news</a>
    </div>
</div>
@endsection
