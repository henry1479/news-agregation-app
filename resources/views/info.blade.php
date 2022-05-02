
@extends('index')
@section('content')
<h2>Information about the Aplication!</h2>
<p>{{ $info }}</p>
<i><a href="{{route('categories')}}">The News Volumes</a></i>
@endsection