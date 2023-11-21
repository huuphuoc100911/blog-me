@extends('manager.layouts.layout')
@section('page-title', 'Quản lý bài giảng')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Bài giảng: {{ $course->name }}</h1>

    <a href="{{ route('manager.courses.index') }}" class="m-2 btn btn-primary">Quay lại khóa học</a>
    <a href="{{ route('manager.lessons.create') }}" class="m-2 btn btn-info">Thêm mới</a>

    @if (session('msg'))
    <div class="alert alert-success">{{ session('msg') }}</div>
    @endif

    @if (session('msg_fail'))
    <div class="alert alert-danger">{{ session('msg_fail') }}</div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bài giảng</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Hình ảnh</th>
                            <th width="13%">Danh mục</th>
                            <th width="25%">Nội dung</th>
                            <th>Giảng viên</th>
                            <th>Giá</th>
                            <th>Hỗ trợ</th>
                            <th>Trạng thái</th>
                            <th>Thời gian</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @forelse ($lessons as $lesson)
                        <tr>
                            <td>{{ $lesson->name }}</td>
                            <td><img src="{{ $lesson->thumbnail_url }}" class="image-viewer" alt=""></td>
                            <td>
                                @foreach ($lesson->categories as $category)
                                    <p><b>{{ $category->name }}</b></p>
                                @endforeach
                            </td>
                            <td>{!! $lesson->description !!}</td>
                            <td>{{ $lesson->teacher->name }}</td>
                            <td>{{ formatPrice($lesson->price) }} VND</td>
                            <td>{!! $lesson->supports !!}</td>
                            <td>
                                @if ($lesson->status == 1)
                                <span class="badge badge-success">Đã ra mắt</span>
                                @else
                                <span class="badge badge-warning">Chưa ra mắt</span>
                                @endif
                            </td>
                            <td>{{ $lesson->created_at }}</td>
                            <td><a href="{{ route('manager.lessons.edit', $lesson) }}" class="btn btn-info">Sửa</a></td>
                            <td><a href="{{ route('manager.lessons.delete', $lesson) }}" class="btn btn-danger delete-action">Xóa</a></td>
                        </tr>
                        @empty
                        <p>Không có bài giảng vào. Vui lòng <a href="{{ route('manager.lessons.create') }}" class="btn btn-info">thêm mới</a></p>
                        @endforelse --}}
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center demo-inline-spacing">
                {{-- {{ $lessons->links('vendor.pagination.custom-pagination') }} --}}
            </div>
        </div>
    </div>
</div>
@include('layouts.delete-form')
@endsection
