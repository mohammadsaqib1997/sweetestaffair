@extends('layouts.admin')

@section('title', 'Add Category')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row justify-content-between ">
            <h4 class="m-0 text-uppercase text-primary">Add Category</h4>
        </div>
        <div class="card-body">
            @if (Session::has('message'))
            <p class="alert alert-success">{{ Session::get('message') }}</p>
            @endif
            @if (Session::has('error'))
            <p class="alert alert-danger">{{ Session::get('error') }}</p>
            @endif

            <form action="{{ route('admin.store-cats') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="form-row  mb-3">
                    <div class="col-2">
                        <label class="mt-2 d-block" for="name">Name</label>
                    </div>
                    <div class="col">
                        <input class="col form-control @error('category') is-invalid @enderror" id="name"
                            name="category" type="text" placeholder="Enter Category Name" value="{{ old('category') }}">
                        @error('category')
                        <p class="text-right text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col narrow">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row justify-content-between ">
            <h4 class="m-0 text-uppercase text-primary">Categories</h4>
        </div>
        <div class="card-body">
            @if ($categories->count() > 0)
            <table class="table">
                <tr>
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>
                @foreach ($categories as $category)
                <tr>
                    <td>
                        {{ $category->name }}
                    </td>
                    <td style="width: 200px;">
                        <div class="btn-group">
                            <a href="{{ route('admin.edit-cats', ['id' => $category->id ]) }}"
                                class="btn btn-primary btn-sm">
                                <i class="far fa-edit"></i>
                            </a>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delCatModal"
                                onclick="document.getElementById('cat_del_id').value={{ $category->id }}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>

            <div class="pg-paginate">
                {{ $categories->onEachSide(3)->links() }}
            </div>
            @else
            <div class="text-center">
                <h3 class="text-muted">No Result Found</h3>
            </div>
            @endif

        </div>
    </div>
</div>

@include('components.delete-category-md')
@endsection