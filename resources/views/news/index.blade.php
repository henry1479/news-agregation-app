@extends('index')
@section('content')


<h2>List of the Articals</h2>
@foreach ($news as $newsItem)


<div class="col-12 col-lg-6">
    <div class="single-blog-post style-3">
        <div class="post-thumb">
        </div>
        <div class="post-data">
            <a href="#" class="post-catagory">{{$newsItem->category_title}}</a>
            <a class="post-title" href="{{ route('categories')}}/{{$newsItem->category_title}}/{{$newsItem->id}}"><h6>{{ $newsItem->title}}</h6></a>
            <p>{{ $newsItem->description }}</p>
            <div class="post-meta">
                <small class="post-data">created at: 20.10.22</small>
            </div>
        </div>     
    </div>
</div>
<hr/>
@endforeach
{{$news->links()}}
<div class="login-with-facebook my-5">
    <a href="{{ route('categories')}}">Back to categories</a>
</div>
@endsection('content')
