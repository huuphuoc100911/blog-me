@extends('manager.layouts.layout')
@section('page-title', 'Quản lý danh mục')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh sách danh mục</h1>

    <a href="{{ route('manager.categories.create') }}" class="m-2 btn btn-info">Thêm mới</a>

    @if (session('msg'))
    <div class="alert alert-success">{{ session('msg') }}</div>
    @endif

    @if (session('msg_fail'))
    <div class="alert alert-danger">{{ session('msg_fail') }}</div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh mục</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Link</th>
                            <th>Thời gian</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>{{ $category->updated_at }}</td>
                            <td><a href="{{ route('manager.categories.edit', $category) }}" class="btn btn-info">Sửa</a></td>
                            <td><a href="{{ route('manager.categories.delete', $category) }}" class="btn btn-danger delete-action">Xóa</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center demo-inline-spacing">
                {{ $categories->links('vendor.pagination.custom-pagination') }}
            </div>
        </div>
    </div>
</div>
@include('layouts.delete-form')
@endsection
