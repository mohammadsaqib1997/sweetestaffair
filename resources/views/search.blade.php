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
            <h4>Search: <i>'{{ request()->input('q') }}'</i></h4>
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