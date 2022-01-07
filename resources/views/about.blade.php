@extends('layouts.app')

@section('title', 'About Us')

@section('page-css')
<link rel="stylesheet" href="{{ asset('css/pages/about.css') }}">
@endsection

@section('content')
@include('inc.hm-header')

<section class="bg-img-sec lazy banner" data-src="{{ asset('images/sld-bn-3.jpg') }}">
</section>

<section class="p-0">
    {{-- <div class="container-fluid">
        <div class="row">
            <div class="col px-0">
                <img class="lazy w-100" data-src="{{ asset('images/prd-1.jpg') }}" alt="" />
            </div>
            <div class="col px-0">
                <img class="lazy w-100" data-src="{{ asset('images/prd-5.jpg') }}" alt="" />
            </div>
            <div class="col px-0">
                <img class="lazy w-100" data-src="{{ asset('images/prd-2.jpg') }}" alt="" />
            </div>
        </div>
    </div> --}}
    <div class="container py-4">
        <h3 class="display-4">The ABC Shop</h3>
        <div class="about-content text-center pt-4">
            <p>The ABC Shop was born at a time when The Middle East enjoyed the golden years and celebrations
                were larger than life. It was a time in the <span class="f-nor">2000</span>s where Dubai became a vibrant capital and all
                sought to genuinely experience the joy of life; a time of all things beautiful and luxurious, and a
                time when the concept of haute-couture in Gifting and Events was being born! In <span class="f-nor">2007</span>, two childhood
                buddy's decided to bring about the worldwide fad of cupcakes to the Middle East. A tiny muffin paved
                the way to glitz and glam in all things sweet. One thing led to the other and today The ABC
                Shop runs its own stand alone store in City, Country; extending its services across the
                country and the Middle East.</p>
        </div>
    </div>
</section>

@include('inc.hm-footer')
@endsection

@section('page-script')
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/lazy.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jq-global.js') }}"></script>
@endsection