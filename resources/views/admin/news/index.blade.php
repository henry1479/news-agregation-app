@extends('index')
@section('content')
@include('inc.messages')

<h2>List of the Articals</h2>
@foreach ($news as $newsItem)


<div class="col-12 col-lg-6">
    <div class="single-blog-post style-3">
        <div class="post-thumb">
        </div>
        <div class="post-data">
            <a href="#" class="post-catagory">{{$category}}</a>
            <a class="post-title" href="{{ route('admin.news.edit', ['news' => $newsItem->id] )}}"><h6>{{ $newsItem->title}}</h6></a>
            <p>{{ $newsItem->description }}</p>
            <div class="post-meta">
            @if($newsItem->created_at)
                <small class="post-data">created at: {{ $newsItem->created_at }}</small>
            @endif
            </div>
        </div>
        <a href="#" class="delete" rel="{{ $newsItem->id }}" name="news" category="{{ $newsItem->category_title}}"><h6>Delete this news</h6></a>       
    </div>
</div>
<hr/>
@endforeach
<a href="{{route('admin.news.create')}}"><h6>Add the news</h6></a>
{{$news->links()}}
<div class="login-with-facebook my-5">
    <a href="{{ route('admin.categories.index')}}">Back to categories</a>
</div>
@endsection('content')
@push('js')
<script src="{{ asset('js/userModules/deleteNews.js')}}"></script>
@endpush