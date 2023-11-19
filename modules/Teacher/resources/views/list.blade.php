@extends('manager.layouts.layout')
@section('page-title', 'Quản lý giảng viên')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh sách giảng viên</h1>

    <a href="{{ route('manager.teachers.create') }}" class="m-2 btn btn-info">Thêm mới</a>

    @if (session('msg'))
    <div class="alert alert-success">{{ session('msg') }}</div>
    @endif

    @if (session('msg_fail'))
    <div class="alert alert-danger">{{ session('msg_fail') }}</div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Giảng viên</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Hình ảnh</th>
                            <th>Tên</th>
                            <th>Nội dung</th>
                            <th>Kinh nghiệm</th>
                            <th>Thời gian</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($teachers as $teacher)
                        <tr>
                            <td><img src="{{ $teacher->avatar_url }}" class="image-viewer" alt=""></td>
                            <td>{{ $teacher->name }}</td>
                            <td>{!! $teacher->description !!}</td>
                            <td>{{ $teacher->exp }}</td>
                            <td>{{ $teacher->created_at }}</td>
                            <td><a href="{{ route('manager.teachers.edit', $teacher) }}" class="btn btn-info">Sửa</a></td>
                            <td><a href="{{ route('manager.teachers.delete', $teacher) }}" class="btn btn-danger delete-action">Xóa</a></td>
                        </tr>
                        @empty
                        <p class="text-center">Không có giảng viên nào. Vui lòng <a href="{{ route('manager.teachers.create') }}" class="btn btn-info">thêm mới</a></p>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center demo-inline-spacing">
                {{ $teachers->links('vendor.pagination.custom-pagination') }}
            </div>
        </div>
    </div>
</div>
@include('layouts.delete-form')
@endsection
