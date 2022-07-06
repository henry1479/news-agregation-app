@extends('index')
@section('content')
<div style="margin-bottom: 10%;">
    <h2>All orders</h2>
</div>
@include('inc.messages')
@foreach($orders as $order)
    <div class="col-12 col-lg-6">
        <div class="single-blog-post style-3">
            <div class="post-data">
            <small>User name</small>
            <br>
              <i>{{ $order->user_name }}</i>
              <br>
              <br>
              <small>Information about the order</small>
              <br>
              <b>{{ $order->order_info }}</b>
              <br>
              <br>
            </div>
        </div>
        <hr>
    </div>
@endforeach

{{$orders->links()}}


<a class="btn-lg btn-info"href="{{ route('orders.create')}}">Create a new order</a>

<div class="login-with-facebook my-5">
    <a href="/">Back to main</a>
</div>
@endsection

