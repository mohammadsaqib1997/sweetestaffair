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
        <a href="callto:+123001111111">+123 00 11 11 111</a>
        <p class="copy mt-3">&copy; Copyright <span class="f-nor">{{ date('Y') }}</span>, ABC Shop.</p>
        <a href="{{ route('main') }}">Back To Home Page</a>
    </div>
</section>
@endsection