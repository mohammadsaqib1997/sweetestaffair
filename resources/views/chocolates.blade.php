@extends('layouts.app')

@section('title', 'Chocolates')

@section('page-css')
@endsection

@section('content')
@include('inc.hm-header')

<section class="products-sec p-0 navbar-pad">
    {{-- container start --}}
    <div class="container py-4">
        <h3 class="display-4">Chocolates</h3>
    </div>
    {{-- container end --}}

    {{-- container-fluid start --}}
    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-sm-6 col-md-4 mt-4 px-0">
                <div class="prd-item">
                    <figure>
                        <img class="lazy" data-src="{{ asset('images/chocolates/prd-1.jpg') }}" alt="" />
                    </figure>
                    <h4 class="mb-2">Rs. 500/-</h4>
                    <button class="btn thm-btn mb-3">Add To Cart</button>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 mt-4 px-0">
                <div class="prd-item">
                    <figure>
                        <img class="lazy" data-src="{{ asset('images/chocolates/prd-2.jpg') }}" alt="" />
                    </figure>
                    <h4 class="mb-2">Rs. 1500/-</h4>
                    <button class="btn thm-btn mb-3">Add To Cart</button>
                </div>
            </div>
        </div>
    </div>
    {{-- container-fluid end --}}
</section>

@include('inc.hm-footer')
@endsection

@section('page-script')
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/lazy.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jq-global.js') }}"></script>
@endsection