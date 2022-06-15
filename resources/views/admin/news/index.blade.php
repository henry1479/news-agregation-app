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
        <a href="#" class="delete" rel="{{ $newsItem->id }}" category="{{ $newsItem->category_title}}"><h6>Delete this news</h6></a>       
    </div>
</div>
<hr/>
@endforeach
<a href="{{route('news.create')}}"><h6>Add the news</h6></a>
{{$news->links()}}
<div class="login-with-facebook my-5">
    <a href="{{ route('categories')}}">Back to categories</a>
</div>
@endsection('content')
@push('js')
<script src="{{ asset('js/userModules/deleteNews.js')}}"></script>
@endpush