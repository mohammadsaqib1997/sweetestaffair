@extends('layouts.app')

@section('title', 'Events')

@section('page-css')
@endsection

@section('content')
@include('inc.hm-header')

<section class="products-sec p-0 navbar-pad">
    {{-- container start --}}
    <div class="container py-4">
        <h3 class="display-4">Events</h3>
    </div>
    {{-- container end --}}

    {{-- container-fluid start --}}
    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-sm-6 col-md-4 mt-4 px-0">
                <div class="prd-item">
                    <figure>
                        <img class="lazy" data-src="{{ asset('images/events/baby showers/1.jpeg') }}" alt="" />
                    </figure>
                    <h4 class="mb-3"><a href="{{ route('eve-bb-shower') }}" class="stretched-link">Baby Showers</a></h4>
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