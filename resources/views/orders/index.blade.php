@extends('index')
@section('content')

<!-- форма заказа -->
<div class="newsletter-widget mb-70">
<h2>Make order</h2>
    <form action="{{ route('orders.store')}}" method="post">
        @csrf
        <input type="text" id ="name" name="user_name" placeholder="name" value="{{ old('user_name')}}"/>
        <input type="email" id="user_email" name="user_email" value="{{ old('user_email') }}" placeholder="email"/>
        <input type="tel" id="user_phone" name="user_phone" value="{{ old('user_phone') }}" placeholder="phone"/>
        <input type="text" id="info" name="info" value="{{ old('info') }}" placeholder="Information about"/>
        <button type="submit" class="btn w-100">Send</button>
    </form>
</div>
@if($state)
    <h2>Your order is saved successfully!!!</h2>
@endif
<div class="login-with-facebook my-5">
    <a href="/">Back to main</a>
</div>
@endsection('content')