@extends('index')
@section('content')
<p>Feedbacks</p>
@if($success)
    <h2>Your feedback is saved successfully!!!</h2>
    <div class="post-details-meta-data mb-50 d-flex align-items-center justify-content-between">
        <div class="post-authors-date">
            <p class="post-author">By <a href="#">{{ $data['user_name']}}</a></p>
            <p class="post-text">Feedback: {{ $data['feedback_body']}} </p>
        </div>
    </div>
@endif
<div class="login-with-facebook my-5">
    <a href="/">Back to main</a>
</div>
@endsection('content')