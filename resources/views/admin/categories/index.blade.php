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
                <a href="{{ route('admin.news.index',['category_id'=> $category->id] ) }}" class="post-title">
                    <h6>{{ $category->title }}</h6>
                </a>
                <a href="{{ route('admin.categories.edit', ['category'=>$category->id])}}">
                    Edit category
                </a>
                <a href="#" class="delete" name="categories" rel="{{ $category->id }}"><h6>Delete this category</h6></a>       
    
            </div>
        </div>
    </div>
@endforeach

{{$news->links()}}


<a class="btn-lg btn-info"href="{{ route('admin.categories.create')}}">Create a new category</a>

<div class="login-with-facebook my-5">
    <a href="/">Back to main</a>
</div>
@endsection
@push('js')
<script src="{{ asset('js/userModules/deleteNews.js')}}"></script>
@endpush

