@extends('index')
@section('content')

<div style="margin-bottom: 10%;">
    <h2>Edit the category</h2>
</div>
<div>
    <form method="post" action="{{ route('category.update', ['category'=>$category_info]) }}">
        @csrf
        <label class="form-label" for="title">Tilte</label>
        <input class="form-control mb-3" type="text" name="title" value="{{$category_info->title}}" />
        <label class="form-label" for="description">Category description</label>
        <textarea class="form-control mb-5" name="description" placeholder="enter the description of the new category">{!! $category_info->description !!}</textarea>
        <button type="submit" class="btn-lg btn-outline-secondary">Edit this category</button>
    </form>
</div>

<div class="login-with-facebook my-5">
    <a href="{{ route('categories')}}">Back to categories</a>
</div>
@endsection
