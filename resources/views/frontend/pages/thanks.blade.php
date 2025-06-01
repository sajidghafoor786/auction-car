@extends('user.layout.app')
@section('title')
    Thank you!
@endsection
@section('bodyContent')
  <div class="container">
    <div class="col-md-12 text-center py-5">
        @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>  
        @endif
        <h1>Thank You!</h1>
        <p>Your order id:  <span class="ms-1">{{ $order->id }} </span></p>
    </div>
  </div>
@endsection