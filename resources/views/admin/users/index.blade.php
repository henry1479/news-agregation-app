@extends('index')
@section('content')
<div style="margin-bottom: 10%;">
    <h2>Users</h2>
</div>
@include('inc.messages')
@foreach($users as $user)
    <div class="col-12 col-lg-6">
        <div class="single-blog-post style-3">
            <div class="post-data">
                <a href="{{ route('admin.users.edit',['user'=> $user->id] ) }}" class="post-title">
                    <h6>{{ $user->name }}</h6>
                </a>
                
            </div>
        </div>
    </div>
@endforeach


<a class="btn-lg btn-info"href="{{ route('admin.categories.create')}}">Create a new category</a>

<div class="login-with-facebook my-5">
    <a href="{{ route('account')}}">Back to account page</a>
</div>
@endsection

