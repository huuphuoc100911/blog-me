@extends('manager.layouts.layout')
@section('page-title', 'Quản lý người dùng')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh sách người dùng</h1>

    <a href="{{ route('manager.users.create') }}" class="m-2 btn btn-info">Thêm mới</a>

    @if (session('msg'))
    <div class="alert alert-success">{{ session('msg') }}</div>
    @endif

    @if (session('msg_fail'))
    <div class="alert alert-danger">{{ session('msg_fail') }}</div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Managers</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Nhóm</th>
                            <th>Thời gian</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($managers as $manager)
                        <tr>
                            <td>{{ $manager->name }}</td>
                            <td>{{ $manager->email }}</td>
                            <td>{{ $manager->group_id }}</td>
                            <td>{{ $manager->created_at }}</td>
                            <td><a href="{{ route('manager.users.edit', $manager) }}" class="btn btn-info">Sửa</a></td>
                            <td><a href="{{ route('manager.users.delete', $manager) }}" class="btn btn-danger delete-action">Xóa</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center demo-inline-spacing">
                {{ $managers->links('vendor.pagination.custom-pagination') }}
            </div>
        </div>
    </div>
</div>
@include('layouts.delete-form')
@endsection
