@extends('index')
@section('content')
<div style="margin-bottom: 10%;">
    <h2>Add news</h2>
</div>
<div>
    <form action="{{ route('news.store') }}" method="post">
        @csrf
        <label class="form-label" for="title">Tilte</label>
        <input type="text" name="title" class="form-control mb-3" />
        <label class="form-label" for="category_id">Category</label>

        <select name="category_id" id="category" class="form-control mb-3">
            @foreach($categories as $category)
            <option 
                @if($category->id === old('$category->id'))
                selected
                @endif
                value="{{$category->id}}">{{$category->title}}
            </option>
            @endforeach
        </select>

        <label class="form-label" for="author">Author</label>
        <input class="form-control" type="text" name="author"/>

        <label class="form-label" for="description">Description</label>
        <textarea class="form-control mb-5" name="description"></textarea>
        <button type="submit" class="btn-lg btn-outline-warning">Add news</button>
    </form>
</div>
<div class="login-with-facebook my-5">
    <a href="{{ route('categories')}}">Back to categories</a>
</div>

@endsection