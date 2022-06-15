@extends('index')
@section('content')

<div style="margin-bottom: 10%;">
    <h2>Adding the new category</h2>
</div>
@include('inc.messages')
<div>
    <form action="{{ route('admin.categories.store')}}" method="post">
        @csrf
        <label class="form-label" for="title">Title</label>
        <input class="form-control mb-3" type="text" name="title" />
        <label class="form-label" for="description">Category description</label>
        <textarea class="form-control mb-5" name="description" placeholder="enter the description of the new category"></textarea>
        <button type="submit" class="btn-lg btn-outline-primary">Add the new category</button>
    </form>
</div>

<div class="login-with-facebook my-5">
        <a href="{{ route('admin.categories.index')}}">Back to categories</a>
    </div>
@endsection
