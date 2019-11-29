@extends('layouts.app')

@section('title', 'Luxury Box | Product')

@section('page-css')
<link rel="stylesheet" href="{{ asset('vendors/datepicker/bootstrap-datepicker3.min.css') }}">
@endsection

@section('content')
@include('inc.hm-header')

<section class="products-sec p-0 navbar-pad">
    <div class="container py-4">
        <h3 class="display-4">Luxury Rose Box</h3>
        <div class="row my-5">
            <div class="col-md-5">
                <img class="lazy img-fluid" data-src="{{ asset('images/floral/luxury-box/prd-2.jpg') }}" alt="" />
            </div>
            <div class="col-md">
                <div id="v-app"></div>
            </div>
        </div>
    </div>
</section>

@include('inc.hm-footer')
@endsection

@section('page-script')
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/lazy.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jq-global.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/datepicker/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/luxury-box.js') }}"></script>
@endsection