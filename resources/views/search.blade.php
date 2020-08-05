@extends('layouts.app')

@section('title', 'Shop')

@section('page-css')
@endsection

@section('content')
@include('inc.hm-header')

<section class="products-sec p-0 navbar-pad">
    <div class="py-4">
        <h3 class="display-4">Search</h3>
    </div>
    <div class="py-4 bg-light">
        <div class="container">
            <h4>Search: <i>'{{ request()->get('q') }}'</i></h4>
        </div>
    </div>
</section>

<section class="products-sec">
    <div class="container mb-5">
        @if(count($prds) < 1) <h3 class="text-center text-muted">No result found!</h3>
            @else
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
            @endif
    </div>
</section>
@include('inc.hm-footer')
@endsection

@section('page-script')
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/lazy.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jq-global.js') }}"></script>
@endsection