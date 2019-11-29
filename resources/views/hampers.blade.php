@extends('layouts.app')

@section('title', 'Hampers | Product')

@section('page-css')
<link rel="stylesheet" href="{{ asset('vendors/datepicker/bootstrap-datepicker3.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/slick/slick.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/pages/hampers.css') }}">
@endsection

@section('content')
@include('inc.hm-header')

<section class="products-sec p-0 navbar-pad">
    <div class="container py-4">
        <h3 class="display-4">Hampers</h3>
        <div class="row my-5">
            <div class="col-md-5">
                <div class="slider">
                    <div>
                        <img class="img-fluid" src="{{ asset('images/hampers/prd-1.jpg') }}" alt="" />
                    </div>
                    <div>
                        <img class="img-fluid" src="{{ asset('images/hampers/prd-2.jpg') }}" alt="" />
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div id="v-app-hamper"></div>
            </div>
        </div>

        <hr>

        <h3 class="display-4">Acrylic Chest</h3>
        <div class="row my-5">
            <div class="col-md-5">
                <img class="lazy img-fluid" data-src="{{ asset('images/acrylic/prd-1.jpg') }}" alt="" />
            </div>
            <div class="col-md">
                <div id="v-app-acrylic"></div>
            </div>
        </div>
    </div>
</section>

@include('inc.hm-footer')
@endsection

@section('page-script')
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/slick/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/lazy.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jq-global.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/datepicker/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/hamper.js') }}"></script>
@endsection