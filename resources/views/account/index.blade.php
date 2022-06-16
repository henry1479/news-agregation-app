@extends('layouts.app')
@section('content')
<h2>Welcome dear {{ Auth::user()->name }}!!!</h2>
<br>
@if(Auth::user()->is_admin)
<a href="{{ route('admin.index')}}">To admin panel</a>
@endif
@endsection