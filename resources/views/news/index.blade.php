@extends('index')
@section('content')


<h2>List of the Articals</h2>

@forelse ($news as $newsItem)

<div class="col-12 col-lg-6">
    <div class="single-blog-post style-3">
        <div class="post-thumb">
        </div>
        <div class="post-data">
            <a href="#" class="post-catagory">{{$newsItem->category_title}}</a>
            <a class="post-title" href="{{ route('categories')}}/{{$newsItem->category_title}}/{{$newsItem->id}}"><h6>{{ $newsItem->title}}</h6></a>
            <p>{!! $newsItem->description !!}</p>
            <div class="post-meta">
            @if($newsItem->created_at)
                <small class="post-data">created at: {{ $newsItem->created_at }}</small>
            @endif
            </div>
        </div>
    </div>
</div>
<hr/>
@empty
<h3>{{ __('There is no news here')}}</h3>
@endforelse
{{$news->links()}}
<div class="login-with-facebook my-5">
    <a href="{{ route('categories')}}">Back to categories</a>
</div>
@endsection('content')
