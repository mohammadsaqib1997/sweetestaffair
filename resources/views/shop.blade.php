@extends('layouts.app')

@section('title', 'Shop')

@section('page-css')
@endsection

@section('content')
@include('inc.hm-header')

<section class="products-sec p-0 navbar-pad">
    {{-- container start --}}
    <div class="container py-4">
        <h3 class="display-4">Shop</h3>
        {{-- <div class="content">
            <p>Each milestone, each relationship, every kind of bond calls for a unique celebration.</p>
            <p>A celebration of moments and emotions that are just blooming, even celebrating those that have already
                blossomed. For such moments, there are luxury flower arrangements by The Floral Studio at Sweetest
                Affair.</p>
            <p>Aesthetically appealing to the eye, these flower arrangements mark the strength of a bond, bring out the
                butterfly-blushed smile of an 18-year-old girl, highlight the rouge on a mother’s face when she hears
                from her distant son. These flowers laden this moment with beauty, luxury and panache and evoke a part
                of you that only poetry can do justice to.</p>

            <p>The Floral Studio birthed from this ardent need to make a moment, any special such moment,
                between individuals, look as beautiful as it feels – An ethereal gifting solution.</p>

            <p>Once you have experienced this picturesque luxury, you’ll know it feels like gifting or
                receiving.</p>
        </div> --}}
    </div>
    {{-- container end --}}

    {{-- New Shop add --}}
    <div class="container mb-5">
        <div class="row">
            @foreach ($prds as $key => $item)
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
    {{-- New Shop add --}}

</section>

@include('inc.hm-footer')
@endsection

@section('page-script')
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/lazy.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jq-global.js') }}"></script>
@endsection