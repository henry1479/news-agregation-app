@extends('index')
@section('content')
@include('inc.messages')
<p>Feedbacks</p>
 @forelse($feeds as $feed)
  <div class="post-details-meta-data mb-50 d-flex align-items-center justify-content-between">
        <div class="post-authors-date">
            <p class="post-author">By <a href="#">{{ $feed->user_name}}</a></p>
            <hr>
            <p class="post-text">Feedback: {{ $feed->feedback_body }} </p>
            <hr>
        </div>
   </div>
 @empty
 <h2>It is not feeds now</h2>
 @endforelse
{{ $feeds->links() }}
<div class="login-with-facebook my-5">
    <a href="/">Back to main</a>
</div>
@endsection('content')