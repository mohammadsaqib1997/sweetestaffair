@extends('layouts.admin')

@section('title', 'Add Product')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row justify-content-between ">
            <h4 class="m-0 text-uppercase text-primary">Add Product</h4>
        </div>
        <div class="card-body">
            @if (Session::has('message'))
            <p class="alert alert-success">{{ Session::get('message') }}</p>
            @endif
            @if (Session::has('error'))
            <p class="alert alert-danger">{{ Session::get('error') }}</p>
            @endif

            <div id="v-app"></div>

        </div>
    </div>
</div>

{{-- @include('components.delete-category-md') --}}
@endsection

@section('page_scripts')
<script src="{{ asset("js/product-add.js") }}"></script>
@endsection