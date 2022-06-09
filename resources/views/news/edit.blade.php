@extends('index') @section('content')

<div style="margin-bottom: 10%;">
	<h2>Edit news</h2>
</div>
@include('inc.messages')
<div>
	<form method="post"
		action="{{ route('news.update', ['news'=>$news]) }}">
		@csrf
		<div class="mb-3">
			<label for="title" class="form-label">Tilte</label> <input
				type="text" class="form-control" name="title"
				value="{{ $news->title }}" />
		</div>

		<div class="mb-3">
			<label for="category_id" class="form-label">Category</label> <select
				name="category_id" id="category" class="form-control"
				aria-label=".form-select-lg"> @foreach($categories as $category)
				<option @if($category->id === old('$category->id')) selected @endif
					value="{{$category->id}}">{{$category->title}}</option> @endforeach
			</select>
		</div>
		<div class="mb-3">
			<label for="author" class="form-label">Author</label> <input
				name="author" type="text" class="form-control"
				value="{{ $news->author }}" />
		</div>
		<div class="form-group">
			<label for="status">Status</label> <select class="form-control"
				name="status" id="status">
				<option @if($news->status === 'DRAFT') selected @endif>DRAFT</option>
				<option @if($news->status === 'ACTIVE') selected @endif>ACTIVE</option>
				<option @if($news->status === 'BLOCKED') selected @endif>BLOCKED</option>
			</select>
		</div>
		<div class="form-group">
			<label for="image">Image</label> <input type="file" id="image"
				name="image" class="form-control">
		</div>
		<div class="mb-5">
			<label for="description" class="form-label">Description</label>
			<textarea type="text" class="form-control" name="description">{!! $news->description !!}</textarea>
		</div>

		<button class="btn-lg btn-outline-success" type="submit">Send editing
			news</button>
	</form>
</div>

<div class="login-with-facebook my-5">
	<a href="{{ route('categories')}}">Back to news</a>
</div>
@endsection
