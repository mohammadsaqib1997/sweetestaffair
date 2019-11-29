@extends('layouts.app')

@section('title', 'Cakes')

@section('page-css')
<link rel="stylesheet" href="{{ asset('css/pages/under-const.css') }}">
@endsection

@section('content')
<section class="bg-img-sec" style="background-image: url({{ asset('images/sld-bn-3.jpg') }})">
    <div class="content">
        <img src="{{ asset('images/logo.png') }}" alt="" />
        <h1 class="display-4">Under Construction</h1>
        <p>Please Contact Our Senior Cake Artist.</p>
        <a href="callto:+923002296555">+923 00 22 96 555</a>
        <p class="copy mt-3">&copy; Copyright <span class="f-nor">{{ date('Y') }}</span>, Sweetest Affair.</p>
        <a href="{{ route('main') }}">Back To Home Page</a>
    </div>
</section>
@endsection