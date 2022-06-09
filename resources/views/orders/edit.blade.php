@extends('index')
@section('content')

<div style="margin-bottom: 10%;">
    <h2>Edit order</h2>
</div>
@include('inc.messages')
<div>
    <form method="post" action="{{ route('orders.update', ['order'=>$order->id]) }}">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="user_name" class="form-label">User name</label>
            <input type="text" class="form-control" name="user_name" value="{{ $order->user_name }}" />
        </div>

        <div class="mb-3">
            <label for="user_email" class="form-label">User email</label>
            <input name="user_email" type="email" class="form-control" value="{{ $order->user_email }}"/>
        </div>
        <div class="mb-3">
            <label for="user_phone" class="form-label">User phone</label>
            <input name="user_phone" type="tel" class="form-control" value="{{ $order->user_phone }}"/>
        </div>

        <div class="mb-5">
        <label for="order_info" class="form-label">Information about order</label>
        <textarea  class="form-control" name="order_info">{!! $order->order_info !!}</textarea>
        </div>
		
        <button class="btn-lg btn-outline-success" type="submit">Send edited order</button>
    </form>
</div>

<div class="login-with-facebook my-5">
    <a href="{{ route('orders.index')}}">Back to order</a>
</div>
@endsection
