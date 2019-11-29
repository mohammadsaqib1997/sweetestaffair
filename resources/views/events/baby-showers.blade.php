@extends('layouts.app')

@section('title', 'Baby Showers | Events')

@section('page-css')
<link rel="stylesheet" href="{{ asset('vendors/magnific/style.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/pages/gallery.css') }}">
@endsection

@section('content')
@include('inc.hm-header')

<section class="gallery-sec p-0 navbar-pad">
    {{-- container start --}}
    <div class="container py-4">
        <h3 class="display-4">Baby Showers</h3>
    </div>
    {{-- container end --}}

    {{-- container-fluid start --}}
    <div class="container-fluid mb-5" id="gallery-cont">
        <div class="row">
            {{-- gallery images start --}}
            @for ($i = 1; $i <= 8; $i++) <div class="col-sm-6 col-md-4 mt-4 px-0">
                <div class="item">
                    <figure class="position-relative">
                        <div class="lazy bg-img" data-src="{{ asset('images/events/baby showers/'.$i.'.jpeg') }}">
                        </div>
                        <a class="stretched-link" href="{{ asset('images/events/baby showers/'.$i.'.jpeg') }}"></a>
                    </figure>
                </div>
        </div>
        @endfor
        {{-- gallery images end --}}

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
<script type="text/javascript" src="{{ asset('vendors/magnific/jquery.magnific-popup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/gallery.js') }}"></script>
@endsection