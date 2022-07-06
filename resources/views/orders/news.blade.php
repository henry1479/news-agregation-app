@extends('index')
@section('content')


<h2>List of the Ordered Articles - {{ $category }}</h2>

@foreach ($news as $newsItem)

<div class="col-12 col-lg-6">
    <div class="single-blog-post style-3">
        <h3>{{ $newsItem['title'] }}</h3>
        <div class="post-thumb">
        </div>
        <div class="post-data">
            <p>{!! $newsItem['description'] !!}</p>
            <div class="post-meta">
                <small class="post-data">created at: {{ $newsItem['pubDate'] }}</small>
            </div>
        </div>     
    </div>
</div>
<hr/>
@endforeach
<div class="login-with-facebook my-5">
    <a href="{{ route('orders.create')}}">Back to creating the order</a>
</div>
@endsection('content')