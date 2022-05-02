@extends('index')
@section('content')


<h2>List of the Articals</h2>
@foreach ($news as $value)


<div class="col-12 col-lg-6">
    <div class="single-blog-post style-3">
        <div class="post-thumb">
            <img src="{{ asset('img/bg-img')}}/{{$value['id'] + 10}}.jpg" alt="{{$value['title']}}">
        </div>
        <div class="post-data">
            <a href="#" class="post-catagory">{{ $category }}</a>
            <a class="post-title" href="{{ route('categories')}}/{{$category}}/{{$value['id']}}"><h6>{{ $value['title']}}</h6></a>
            <p>{{ $value['description']}}</p>
            <div class="post-meta">
                <small class="post-data">created at: {{ $value['created_at'] }}</small>
            </div>
        </div>       
    </div>
</div>
<hr/>
@endforeach
<div class="login-with-facebook my-5">
    <a href="{{ route('categories')}}">Back to categories</a>
</div>
@endsection('content')