@extends('index')
@section('content')

<div style="margin-bottom: 10%;">
    <h2>Edit {{$user->name}}</h2>
</div>
@include('inc.messages')
<div>
    <form method="post" action="{{ route('admin.users.update', ['user'=>$user->id]) }}">
        @csrf
        @method('put')
        <label class="form-label" for="title">Name</label>
        <input class="form-control mb-3" type="text" name="name" value="{{$user->name}}" />
        <label class="form-label" for="email">Email</label>
        <input class="form-control mb-3" type="email" name="email" value="{{$user->email}}" />
        <h4>Administrator's state</h4>
        <span>yes</span>
        <input class="form-control mb-3" type="radio" name="is_admin" value=true @if($user->is_admin) checked @endif />
        <span>no</span>
        <input class="form-control mb-3" type="radio" name="is_admin" value=false @if(!$user->is_admin) checked @endif />
       
        <button type="submit" class="btn-lg btn-outline-secondary">Edit {{ $user->name }}</button>
    </form>
</div>
<div class="login-with-facebook my-5">
    <a href="{{ route('admin.users.index')}}">Back to users</a>
</div>
@endsection
