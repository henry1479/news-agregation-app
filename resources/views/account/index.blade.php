@extends('layouts.app')
@section('content')
<h2>Welcome dear {{ Auth::user()->name }}!!!</h2>
<br>
<a href="{{ route('categories')}}">To news categories</a>
@endsection