@extends('index')
@section('content')
<div style="margin-bottom: 10%;">
	<h2>Add a rss source of news</h2>
</div>
@include('inc.messages')
<div>
	<form action="{{ route('admin.sources.store') }}" method="post">
		@csrf 
		<label class="form-label" for="source_name">Source name</label> 
		<input type="text" name="source_name" class="form-control mb-3" value="{{ old('source_name') }}" />
		<label class="form-label" for="suorce_url">Source url</label>
		<input type="url" value="{{ old('source_url') }}" name="source_url" class="form-control mb-3"/>
		<div class="add-post-button">
			<button type="submit" class="btn add-post-btn">Add source</button>
		</div>
	</form>
</div>
<div class="login-with-facebook my-5">
	<a href="{{ route('admin.index')}}">Back to admin panel</a>
</div>

@endsection
