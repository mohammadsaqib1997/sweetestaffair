@extends('layouts.app')

@section('title', 'Product')

@section('page-css')
<link rel="stylesheet" href="{{ asset('vendors/datepicker/bootstrap-datepicker3.min.css') }}">
@endsection

@section('content')
@include('inc.hm-header')

<section class="products-sec p-0">
    <div class="container py-4">
        <h3 class="display-4">Product Title</h3>
        <div class="row my-5">
            <div class="col-md-5">
                <img class="lazy w-100" data-src="{{ asset('images/slid-'.$slide.'.jpg') }}" alt="" />
            </div>
            <div class="col-md">
                <div class="form mt-4 mt-md-0">
                    <div class="form-group">
                        <label for="">Choice Of Flowers <small>(Subject to Availability)</small></label>
                        <select name="" id="" class="form-control">
                            <option value="">Select Flowers</option>
                            <option value="Rose">Rose</option>
                            <option value="Tulips">Tulips</option>
                            <option value="Orchids">Orchids</option>
                            <option value="Sunflower">Sunflower</option>
                            <option value="Lilies">Lilies</option>
                            <option value="Daffodils">Daffodils</option>
                            <option value="Marigold">Marigold</option>
                            <option value="Lotus">Lotus</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Box Color <small>(Subject to Availability)</small></label>
                        <select name="" id="" class="form-control">
                            <option value="">Select Color</option>
                            <option value="Black">Black</option>
                            <option value="Blue">Blue</option>
                            <option value="Purple">Purple</option>
                            <option value="White">White</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Sweet Selection</label>
                        <select name="" id="" class="form-control">
                            <option value="">Select Sweets</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Delivery Date/Time</label>
                        <div class="form-row">
                            <div class="col">
                                <input type='text' id="datepicker" class="form-control" placeholder="Select Date" />
                            </div>
                            <div class="col">
                                <select name="" id="" class="form-control">
                                    <option value="">Select Time</option>
                                    <option value="9-12">Between 9am - 12pm</option>
                                    <option value="12-3">Between 12pm - 3pm</option>
                                    <option value="3-6">Between 3pm - 6pm</option>
                                    <option value="6-9">Between 6pm - 9pm</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Instruction</label>
                        <textarea name="" class="form-control" id="" rows="3" placeholder="Any comments ..."></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Quantity</label>
                        <input type="number" class="form-control" value="1" min="1" max="10">
                    </div>

                    <div class="form-group">
                        <button class="btn thm-btn">Add To Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('inc.hm-footer')
@endsection

@section('page-script')
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/lazy.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jq-global.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/datepicker/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/about.js') }}"></script>
@endsection