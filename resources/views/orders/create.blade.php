@extends('index')
@section('content')
@include('inc.messages')
<!-- форма заказа -->
<div class="newsletter-widget mb-70">
<h2>Make order</h2>
    <form action="{{ route('orders.store')}}" method="post">
        @csrf
        <input type="text" id ="name" name="user_name" placeholder="name" value="{{ old('user_name')}}"/>
        <input type="email" id="user_email" name="user_email" value="{{ old('user_email') }}" placeholder="email"/>
        <input type="tel" id="user_phone" name="user_phone" value="{{ old('user_phone') }}" placeholder="phone"/>
        <input type="text" id="info" name="order_info" value="{{ old('order_info') }}" placeholder="Information about"/>
        <button type="submit" dusk="send" class="btn w-100">Send order</button>
    </form>
</div>

<div class="login-with-facebook my-5">
    <a href="/">Back to main</a>
</div>
<a class="btn btn-outline-success" href="{{ route('orders.index')}}">
   See the all orders
</a>
@endsection('content')
