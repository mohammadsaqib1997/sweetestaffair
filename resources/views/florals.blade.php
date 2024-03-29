@extends('layouts.app')

@section('title', 'Florals | Product')

@section('page-css')
<link rel="stylesheet" href="{{ asset('vendors/datepicker/bootstrap-datepicker3.min.css') }}">
@endsection

@section('content')
@include('inc.hm-header')

<section class="products-sec p-0 navbar-pad">
    <div class="container py-4">
        <h3 class="display-4">Florals</h3>
        <div id="v-app" class="row my-5"></div>
    </div>
</section>

@include('inc.hm-footer')
@endsection

@section('page-script')
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/lazy.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jq-global.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/datepicker/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/product.js') }}"></script>
@endsection