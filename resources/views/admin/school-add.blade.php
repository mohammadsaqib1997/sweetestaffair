@extends('layouts.admin-panel')

@section('title', 'Admin Dashboard')

@section('page-css')
<style>
    #map {
        height: 300px;
        width: 100%;
    }
</style>
@endsection

@section('content')
<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row justify-content-between ">
        <h4 class="m-0 text-uppercase text-primary">Add New School</h4>
        {{-- <a href="#" class="btn btn-danger btn-sm">
            Add New School
        </a> --}}
    </div>
    <div class="card-body">
        {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif --}}
    <form action="{{ route('admin.school-store') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="form-row  mb-3">
            <div class="col-2">
                <label class="mt-2 d-block" for="name">Name</label>
            </div>
            <div class="col">
                <input class="col form-control @error('fullname') is-invalid @enderror" id="name" name="fullname"
                    type="text" placeholder="Enter Full Name" value="{{ old('fullname') }}">
                @error('fullname')
                <p class="text-right text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="form-row  mb-3">
            <div class="col-2">
                <label class="mt-2 d-block" for="mobile">Mobile</label>
            </div>
            <div class="col">
                <input class="col form-control @error('mobile') is-invalid @enderror" id="mobile" name="mobile"
                    type="tel" placeholder="Enter Mobile Number" value="{{ old('mobile') }}">
                @error('mobile')
                <p class="text-right text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="form-row  mb-3">
            <div class="col-2">
                <label class="mt-2 d-block" for="username">Account Details</label>
            </div>
            <div class="col">
                <input class="col form-control @error('username') is-invalid @enderror" id="username" type="text"
                    name="username" value="{{ old('username') }}" placeholder="Enter Username">
                @error('username')
                <p class="text-right text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col">
                <input class="col form-control @error('password') is-invalid @enderror" id="password" type="password"
                    name="password" placeholder="Enter Password">
                @error('password')
                <p class="text-right text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="form-row  mb-3">
            <div class="col-2">
                <label class="mt-2 d-block" for="address">Address</label>
            </div>
            <div class="col">
                <input class="col form-control @error('address') is-invalid @enderror" id="address" type="text"
                    name="address" value="{{ old('address') }}" placeholder="Enter Address">
                @error('address')
                <p class="text-right text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="form-row ">
            <div class="col-2">
                <label class="mt-2 d-block" for="location">Location</label>
            </div>
            <div class="col-10">
                <input
                    class="col form-control @error('location.name') is-invalid @enderror @error('location.latlng') is-invalid @enderror"
                    id="location" type="text" name="location[name]" value="{{ old('location.name') }}"
                    placeholder="Enter Map Search">
                <input type="hidden" id="latlng" name="location[latlng]" value="{{ old('location.latlng') }}">
                @if($errors->has('location.name'))
                <p class="text-right text-danger">{{ $errors->first('location.name') }}</p>
                @elseif($errors->has('location.latlng'))
                <p class="text-right text-danger">{{ $errors->first('location.latlng') }}</p>
                @endif
            </div>
            <div class="col-10 offset-2 mt-3">
                <div id="map"></div>
            </div>
        </div>

        <div class="form-row  mt-3">
            <div class="col-10 offset-2">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>

    </form>
</div>
</div>
@endsection

@section('page-script')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCXSE9NJZ6DIq7lBmXiJ4OLaeQEK2tR8QY&libraries=places">
</script>
<script src="{{ asset('js/pages/admin/add-school.js') }}" async defer></script>
@endsection