@extends('index')
@section('content')
@include('inc.messages')
<div style="margin-bottom: 10%;">
    <h2>Admin {{ Auth::user()->name }} </h2>
</div>
<a href="{{ route('account')}}">Back to account page</a><br>
<a href="{{ route('admin.users.index')}}">Users</a><br>
<a href="{{ route('admin.categories.index')}}">News volumes</a><br>
<a href="{{ route('admin.sources.create')}}">Sources</a><br>
<a href="{{ route('admin.parser')}}">Parser</a><br>

<a href="/">Main</a>


@endsection