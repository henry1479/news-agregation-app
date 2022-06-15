@extends('index')
@section('content')
<div style="margin-bottom: 10%;">
    <h2>News Volumes</h2>
</div>
@include('inc.messages')
@foreach($news as $category)
    <div class="col-12 col-lg-6">
        <div class="single-blog-post style-3">
            <div class="post-data">
                <a href="{{route('categories')}}/{{$category->title}}" class="post-title">
                    <h6>{{ $category->title }}</h6>
                </a>
                <p>{{$category->description}}</p>
            </div>
        </div>
    </div>
@endforeach

{{$news->links()}}




<div class="login-with-facebook my-5">
    <a href="/">Back to main</a>
</div>
@endsection

