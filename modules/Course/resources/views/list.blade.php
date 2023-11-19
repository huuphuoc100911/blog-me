@extends('manager.layouts.layout')
@section('page-title', 'Quản lý khóa học')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh sách khóa học</h1>

    <a href="{{ route('manager.courses.create') }}" class="m-2 btn btn-info">Thêm mới</a>

    @if (session('msg'))
    <div class="alert alert-success">{{ session('msg') }}</div>
    @endif

    @if (session('msg_fail'))
    <div class="alert alert-danger">{{ session('msg_fail') }}</div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Khóa học</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Danh mục</th>
                            <th>Hình ảnh</th>
                            <th>Nội dung</th>
                            <th>Giá</th>
                            <th>Hỗ trợ</th>
                            <th>Trạng thái</th>
                            <th>Thời gian</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($courses as $course)
                        <tr>
                            <td>{{ $course->name }}</td>
                            <td>{{ $course->ccategory->name }}</td>
                            <td><img src="{{ $course->thumbnail_url }}" class="image-viewer" alt=""></td>
                            <td>{!! $course->description !!}</td>
                            <td>{{ formatPrice($course->price) }} VND</td>
                            <td>{!! $course->supports !!}</td>
                            <td>
                                @if ($course->status == 1)
                                <span class="badge badge-success">Đã ra mắt</span>
                                @else
                                <span class="badge badge-danger">Chưa ra mắt</span>
                                @endif
                            </td>
                            <td>{{ $course->created_at }}</td>
                            <td><a href="{{ route('manager.courses.edit', $course) }}" class="btn btn-info">Sửa</a></td>
                            <td><a href="{{ route('manager.courses.delete', $course) }}" class="btn btn-danger delete-action">Xóa</a></td>
                        </tr>
                        @empty
                            <p>Không có khóa học vào. Vui lòng <a href="{{ route('manager.courses.create') }}" class="btn btn-info">thêm mới</a></p>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center demo-inline-spacing">
                {{ $courses->links('vendor.pagination.custom-pagination') }}
            </div>
        </div>
    </div>
</div>
@include('layouts.delete-form')
@endsection
