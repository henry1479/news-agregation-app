
@extends('index')
@section('content')
<div style="margin-bottom: 10%;">
    <h2>News Volumes</h2>
</div>
@foreach ($news as $key=>$value)
    <div class="col-12 col-lg-6">
        <div class="single-blog-post style-3">
            <div class="post-data">
                <a href="{{route('categories')}}/{{$key}}" class="post-title">
                    <h6>{{ $key }}</h6>
                </a>
            </div>
        </div>
    </div>
@endforeach
<div class="login-with-facebook my-5">
        <a href="/">Back to main</a>
    </div>
@endsection

                        