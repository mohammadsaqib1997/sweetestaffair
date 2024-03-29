@extends('layouts.app')

@section('title', 'Home')

@section('page-css')
<link rel="stylesheet" href="{{ asset('vendors/slick/slick.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/pages/home.css') }}">
@endsection

@section('content')
@include('inc.hm-header')

<div class="slider-container">
    <div class="video-wrapper">
        <video autoplay muted loop>
            <source src="{{ asset('videos/hm-vid-1.mp4') }}" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
    </div>
    {{-- <div class="slider">
        <div style="background-image: url({{ asset('images/sld-bn-4.jpg') }});">
</div>
<div style="background-image: url({{ asset('images/sld-bn-2.jpeg') }});"></div>
<div style="background-image: url({{ asset('images/sld-bn-5.jpeg') }});"></div>
<div style="background-image: url({{ asset('images/sld-bn-1.jpeg') }});"></div>
</div> --}}
</div>

{{-- <section class="info-sec py-4">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md">
                <h4>The ABC Shop</h4>
                <p class="lead text-justify mb-3 mb-md-0">
                    Every accomplishment, every relationship, each sort of bond carries a special flavor in it, and here
                    we try to enhance these flavors by adding our own. ...
                </p>
            </div>
            <div class="col btn-cont">
                <a href="{{ route('about') }}" class="btn thm-btn">Read More</a>
    </div>
    </div>
    </div> 
</section> --}}

<section class="bg-img-sec lazy info-sec" data-src="{{ asset('images/sld-bn-3.jpg') }}">
    <div class="container-fluid">
        <div class="content">
            <h3 class="display-4">The ABC Shop</h3>
            <div class="text-center pt-4">
                <p>The ABC Shop was born at a time when The Middle East enjoyed the golden years and celebrations
                    were larger than life. It was a time in the 2000s where Dubai became a vibrant capital and all
                    sought to genuinely experience the joy of life; a time of all things beautiful and luxurious, and a
                    time when the concept of haute-couture in Gifting and Events was being born! In 2007, two childhood
                    buddy's decided to bring about the worldwide fad of cupcakes to the Middle East. A tiny muffin paved
                    the way to glitz and glam in all things sweet. One thing led to the other and today The Sweetest
                    Affair runs its own stand alone store in Karachi, Pakistan; extending its services across the
                    country and the Middle East.</p>
            </div>
        </div>

    </div>
</section>

<section class="products-sec">
    <div class="container">
        <h3 class="display-4">Our Products</h3>
        <div class="content">
            <p>Each milestone, each relationship, every kind of bond calls for a unique celebration.</p>
            <p>A celebration of moments and emotions that are just blooming, even celebrating those that have already
                blossomed. For such moments, there are luxury flower arrangements by The Floral Studio at ABC
                Shop.</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($our_products as $key => $item)
            <div class="col-sm-6 col-md-3 mt-4 px-0">
                <div class="prd-item">
                    <figure>
                        <img class="lazy" data-src="{{ asset($item['img']) }}" alt="" />
                    </figure>
                    <h4><a href="{{ route($item['route-name'], ['prd_slug' => $key]) }}"
                            class="stretched-link">{{ $item['title'] }}</a></h4>
                    <p class="meta-price">{{ $item['price-range'] }}</p>
                    <p>Shop Now</p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('shop') }}" class="btn thm-btn">Show More</a>
        </div>
    </div>
</section>

<section class="bg-img-sec lazy info-sec" data-src="{{ asset('images/sld-bn-3.jpg') }}">
    <div class="container-fluid">
        <div class="content">
            <h3 class="display-4">THE ART OF PACKAGING</h3>
            <div class="text-center pt-4">
                <p>In line with our haute-couture philosophy, each and every box is carefully handmade to guarantee
                    impeccable finishing and quality. Whether it is to store your jewels or use as decoration, our boxes
                    come in different colors and materials; the artisans are capable of personalizing every element and
                    detail of production. Whether it is the material, size, shape, embossment, or ornaments, anything
                    imaginable is possible!</p>

                <p>The ABC Shop carefully selects the best velvet, leather, wood and silk from around the world
                    to ensure bespoke quality and the best value.</p>

                <p>All creation of packaging takes place in the atelier where the artisans are their own critics; with a
                    strict work ethic, their concern for detail is demonstrated in the perfect finishing.</p>
            </div>
        </div>

    </div>
</section>

<section class="products-sec">
    <div class="container">
        <h3 class="display-4">Best Sellers</h3>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($best_seller as $key => $item)
            <div class="col-sm-6 col-md-3 mt-4 px-0">
                <div class="prd-item">
                    <figure>
                        <img class="lazy" data-src="{{ asset($item['img']) }}" alt="" />
                    </figure>
                    <h4><a href="{{ route($item['route-name'], ['prd_slug' => $key]) }}"
                            class="stretched-link">{{ $item['title'] }}</a></h4>
                    <p class="meta-price">{{ $item['price-range'] }}</p>
                    <p>Shop Now</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="bg-img-sec contact-cont lazy" data-src="{{ asset('images/sld-bn-3.jpg') }}">
    <div class="container-fluid">
        <h3 class="display-4 mb-4">Contact Us</h3>
        <p class="txt-content">Since we are a Digital Boutique it would be best if you contact us via email at
            info@abc-msaqib1997.com
            In case you need to get in touch with us via phone you can call us on +123 11 11 11 111, (Business hours:
            Seven days a week, 11:00 am - 09:00 pm)</p>
        <div class="row mx-w-1100">
            <div class="col mb-4 mb-md-0">
                <div class="cont-item">
                    <h4>PERSONALIZED</h4>
                    <p>Custom-made bespoke flower arrangements that will exceed your expectations.
                        <br>Get The ABC Shop flowers customized by adding patterns, symbols, letters & much more!
                    </p>
                </div>
            </div>
            <div class="col mb-4 mb-md-0">
                <div class="cont-item">
                    <h4>CORPORATE ORDERS</h4>
                    <p>Corporate gifting, professional relationships, important conferences – celebrate them with the
                        The ABC Shop experience. Please contact us on +123 11 11 11 111 to know more.</p>
                </div>
            </div>
            <div class="col">
                <div class="cont-item">
                    <h4>EVENTS</h4>
                    <p>Weddings, birthdays, Valentine’s Day, dinners, first dates, candlelight
                        <br>getaways – the list is endless and so are the The ABC Shop offerings. Please contact
                        us on +123 11 11 11 111
                        to know more.</p>
                </div>
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
<script type="text/javascript" src="{{ asset('js/home.js') }}"></script>
@endsection