@extends('layouts.admin')

@section('title', 'Edit Category')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row justify-content-between ">
        <h4 class="m-0 text-uppercase text-primary">Edit Category</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.update-cats', ['id' => $category->id]) }}" method="POST" class="needs-validation"
            novalidate>
            @method('put')
            @csrf
            <div class="form-row  mb-3">
                <div class="col-2">
                    <label class="mt-2 d-block" for="name">Name</label>
                </div>
                <div class="col">
                    <input class="col form-control @error('category') is-invalid @enderror" id="name" name="category"
                        type="text" placeholder="Enter Category Name"
                        value="{{ old('category') ?? $category->name }}">
                    @error('category')
                    <p class="text-right text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="form-row  mb-3">
                <div class="col-2">
                    <label class="mt-2 d-block" for="slug">Slug</label>
                </div>
                <div class="col">
                    <input class="col form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                        type="text" placeholder="Enter Slug"
                        value="{{ old('slug') ?? $category->slug }}">
                    @error('slug')
                    <p class="text-right text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col narrow">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection