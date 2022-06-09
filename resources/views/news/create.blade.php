@extends('index') @section('content') @dump(old('title'))
<div style="margin-bottom: 10%;">
	<h2>Add news</h2>
</div>
@include('inc.messages')
<div>
	<form action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">
		@csrf <label class="form-label" for="title">Tilte</label> <input
			type="text" name="title" class="form-control mb-3"
			value="{{ old('title') }}" /> <label class="form-label"
			for="category_id">Category</label> <select name="category_id"
			id="category" class="form-control mb-3"> @foreach($categories as
			$category)
			<option @if($category->id === old('$category->id')) selected @endif
				value="{{$category->id}}">{{$category->title}}</option> @endforeach
		</select>
		<div class="form-group">
			<label for="status">Status</label> <select class="form-control"
				name="status" id="status">
				<option @if(old('status') === 'DRAFT') selected @endif>DRAFT</option>
				<option @if(old('status') === 'ACTIVE') selected @endif>ACTIVE</option>
				<option @if(old('status') === 'BLOCKED') selected @endif>BLOCKED</option>
			</select>
		</div>
		<div class="form-group">
			<label for="image">Image</label> <input type="file" id="image"
				name="image" class="form-control">
		</div>
		<label class="form-label" for="author">Author</label> <input
			class="form-control" type="text" name="author"
			value="{{ old('author') }}" /> <label class="form-label"
			for="description">Description</label>
		<textarea class="form-control mb-5" name="description">{!! old('description') !!}</textarea>
		<button type="submit" class="btn-lg btn-outline-warning">Add news</button>
	</form>
</div>
<div class="login-with-facebook my-5">
	<a href="{{ route('categories')}}">Back to categories</a>
</div>

@endsection
