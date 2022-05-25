@extends('index')
@section('content')


<h2>List of the Articales</h2>
@foreach ($news as $value)


<div class="col-12 col-lg-6">
    <div class="single-blog-post style-3">
        <div class="post-thumb">
        </div>
        <div class="post-data">
            <a href="#" class="post-catagory">{{$category}}</a>
            <a class="post-title" href="{{ route('categories')}}/{{$value->category_title}}/{{$value->id}}"><h6>{{ $value->title}}</h6></a>
            <p>{{ $value->description}}</p>
            <div class="post-meta">
                <small class="post-data">created at: 20.10.22</small>
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