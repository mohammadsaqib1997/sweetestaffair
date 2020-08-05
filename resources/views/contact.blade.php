@extends('layouts.app')

@section('title', 'Contact Us')

@section('page-css')
<link rel="stylesheet" href="{{ asset('css/pages/contact.css') }}">
@endsection

@section('content')
@include('inc.hm-header')

<section class="p-0 navbar-pad">
    <div class="container py-4">
        <h3 class="display-4">Contact Us</h3>
    </div>
</section>

<section class="bg-light py-5 content-sec" id="form">
    <div class="container">
        <h3>Get in Touch</h3>
        <p>If you have general questions about what we do or how The Sweetest Affair can help you,
            <br>please fill out the contact form below or call us directly on the given numbers.</p>
        <div class="row mt-4">

            <form action="{{ route('contact-mail') }}" method="POST" class="col-12 col-md-6">
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                @csrf
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Full Name" value="{{ old('name') }}">
                    @error('name')
                    <p class="text-danger small text-right">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                    @error('email')
                    <p class="text-danger small text-right">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="tel" name="phone" class="form-control" placeholder="Phone Number" value="{{ old('phone') }}">
                    @error('phone')
                    <p class="text-danger small text-right">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea name="message" class="form-control" rows="3" placeholder="Message">{{ old('message') }}</textarea>
                    @error('message')
                    <p class="text-danger small text-right">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn thm-btn">Submit</button>
                </div>
            </form>
            <div class="col-12 col-md-6">
                <div class="row">
                    <div class="col-md-4 mt-3"><strong>Office Address :</strong></div>
                    <div class="col-md-8 mt-md-3 mt-2">22C, Tauheed Commercial, street 26, DHA, Karachi, Pakistan</div>
                    <div class="col-md-4 mt-3"><strong>Phone :</strong></div>
                    <div class="col-md-8 mt-md-3 mt-2">+923 00 22 96 555</div>
                    <div class="col-md-4 mt-3"><strong>Days & Timings :</strong></div>
                    <div class="col-md-8 mt-md-3 mt-2">Seven days a week,<br>10:30 am - 11:30 pm</div>
                    <div class="col-md-4 mt-3"><strong>Email addresses :</strong></div>
                    <div class="col-md-8 mt-md-3 mt-2">info@sweetestaffair.com</div>
                </div>

                {{-- <hr>

                <h4>Social:</h4>
                <ul class="icon-menu">
                    <li>
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="https://wa.me/923002296555">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </li>
                </ul> --}}
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

@endsection