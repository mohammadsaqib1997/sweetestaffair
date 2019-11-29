@extends('layouts.admin-panel')

@section('title', 'Admin Dashboard')

@section('content')
<!-- Page Heading -->
{{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Schools List</h1>

    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div> --}}

<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row justify-content-between align-items-center">
        <h4 class="m-0 text-uppercase text-primary">Schools List</h4>
        <a href="{{ route('admin.school-add') }}" class="btn btn-danger btn-sm">
            Add New School
        </a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <td scope="col">#</td>
                    <td scope="col">Name</td>
                    <td scope="col">Address</td>
                    <td scope="col">Created At</td>
                    <td scope="col">Actions</td>
                </tr>
            </thead>
            <tbody>
                @for($i=0; $i< 5; $i++) <tr>
                    <th scope="row">1</th>
                    <td>KPS</td>
                    <td>abc...</td>
                    <td>11:22 am 12-12-2019</td>
                    <td>
                        <a href="#" class="btn btn-info btn-circle btn-sm">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="#" class="btn btn-success btn-circle btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-circle btn-sm">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>
    </div>
</div>
@endsection