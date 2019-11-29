@extends('layouts.app')

@section('title', 'Under Construction')

@section('page-css')
<link rel="stylesheet" href="{{ asset('css/pages/under-const.css') }}">
@endsection

@section('content')
<section class="bg-img-sec" style="background-image: url({{ asset('images/sld-bn-3.jpg') }})">
    <div class="content">
        <img src="{{ asset('images/logo.png') }}" alt="" />
        <h1 class="display-4">Under Construction</h1>
        <p>We're making lots of improvements and will be back soon.</p>
        <p class="copy">&copy; Copyright <span class="f-nor">{{ date('Y') }}</span>, Sweetest Affair.</p>
        <a href="{{ route('main') }}">Back To Home Page</a>
    </div>
</section>
@endsection