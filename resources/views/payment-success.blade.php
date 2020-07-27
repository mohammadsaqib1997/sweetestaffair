@extends('layouts.app')

@section('title', 'Order Details')

@section('content')
@include('inc.hm-header')

<section class="p-0 navbar-pad">
    <div class="container py-4">
        <h3 class="display-4">Order Details</h3>
    </div>
</section>

<section class="bg-light py-5 content-sec">
    <div class="container">
        <h3>Thank you for your order!</h3>
        <p>Your order id is #{{ $order_id }}</p>
        <p>We will email you, your order details and tracking information.</p>
        <a href="{{ route('shop') }}" class="btn thm-btn">Continue Shopping</a>
    </div>
</section>
@include('inc.hm-footer')
@endsection

@section('page-script')
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/lazy.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jq-global.js') }}"></script>

@endsection