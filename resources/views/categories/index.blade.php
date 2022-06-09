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
                <a href="{{ route('category.edit', ['category_id'=> $category->id])}}">
                    Edit category
                </a>
            </div>
        </div>
    </div>
@endforeach

{{$news->links()}}


<a class="btn-lg btn-info"href="{{ route('category.create')}}">Create a new category</a>

<div class="login-with-facebook my-5">
    <a href="/">Back to main</a>
</div>
@endsection

