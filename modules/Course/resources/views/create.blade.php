@extends('manager.layouts.layout')
@section('page-title', 'Thêm khóa học')
@section('content')
@push('styles')
<style>
    .image-courses {
        max-width: 100%;
        height: 200px;
    }
</style>

@endpush
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Thêm khóa học</h1>
    </div>
    <form action="{{ route('manager.courses.store') }}" method="post" class="ml-3">
        @csrf
        <div class="row">
            <div class="col-4">
                <div class="mb-3">
                    <label for="name">Tên</label>
                    <input type="text" id="name" name="name"
                        class="slug-origin form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                        value="{{ old('name') }}" placeholder="Nhập tên" />
                    @error('name')
                    <span class="text-danger" role="alert">
                        <p>{{ $message }}</p>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                <div class="mb-3">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" id="slug"
                        class="slug-render form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}"
                        value="{{ old('slug') }}" placeholder="Nhập slug" />
                    @error('slug')
                    <span class="text-danger" role="alert">
                        <p>{{ $message }}</p>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                <div class="mb-3">
                    <label for="code">Mã khóa học</label>
                    <input type="text" id="code" name="code"
                        class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" value="{{ generateRandomString() }}"
                        placeholder="Nhập mã khóa học" />
                    @error('code')
                    <span class="text-danger" role="alert">
                        <p>{{ $message }}</p>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="category_id">Danh mục bài giảng</label>
                    <select name="category_id" id="category_id"
                        class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}"
                        value="{{ old('category_id') }}">
                        <option value="0">Chọn danh mục</option>
                        @foreach ($categories as $key => $category)
                            <option value="{{ $key }}" {{ old('category_id') == $key ? 'selected' : '' }}>{{ $category }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <span class="text-danger" role="alert">
                        <p>{{ $message }}</p>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="teacher_id">Giảng viên</label>
                    <select name="teacher_id" id="teacher_id"
                        class="form-control {{ $errors->has('teacher_id') ? 'is-invalid' : '' }}"
                        value="{{ old('teacher_id') }}">
                        <option value="0">Chọn giảng viên</option>
                        <option value="1">Tạ Hoàng An</option>
                        <option value="2">Đặng Hoàng Sơn</option>
                    </select>
                    @error('teacher_id')
                    <span class="text-danger" role="alert">
                        <p>{{ $message }}</p>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="price">Giá khóa học</label>
                    <input type="text" name="price" id="price"
                        class="form-control number-format {{ $errors->has('price') ? 'is-invalid' : '' }}"
                        value="{{ old('price') }}" placeholder="Nhập giá" />
                    @error('price')
                    <span class="text-danger" role="alert">
                        <p>{{ $message }}</p>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="sale_price">Giá khuyến mãi</label>
                    <input type="number" name="sale_price" id="sale_price"
                        class="form-control {{ $errors->has('sale_price') ? 'is-invalid' : '' }}"
                        value="{{ old('sale_price') }}" placeholder="Nhập khuyến mãi" />
                    @error('sale_price')
                    <span class="text-danger" role="alert">
                        <p>{{ $message }}</p>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="description">Nội dung</label>
                    <textarea rows="3" type="text" name="description" id="description"
                        class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}"
                        value="{{ old('description') }}" placeholder="Nhập nội dung">{{ old('description') }}</textarea>
                    @error('description')
                    <span class="text-danger" role="alert">
                        <p>{{ $message }}</p>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="supports">Hỗ trợ</label>
                    <textarea rows="3" type="text" name="supports" id="supports"
                        class="form-control ckeditor {{ $errors->has('supports') ? 'is-invalid' : '' }}"
                        value="{{ old('supports') }}" placeholder="Nhập hỗ trợ">{{ old('supports') }}</textarea>
                    @error('supports')
                    <span class="text-danger" role="alert">
                        <p>{{ $message }}</p>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="is_document">Tài liệu đính kèm</label>
                    <select name="is_document" id="is_document"
                        class="form-control {{ $errors->has('is_document') ? 'is-invalid' : '' }}"
                        value="{{ old('is_document') }}">
                        <option value="0">Không</option>
                        <option value="1">Có</option>
                    </select>
                    @error('is_document')
                    <span class="text-danger" role="alert">
                        <p>{{ $message }}</p>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="status">Trạng thái</label>
                    <select name="status" id="status"
                        class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}"
                        value="{{ old('status') }}">
                        <option value="0">Chưa ra mắt</option>
                        <option value="1">Đã ra mắt</option>
                    </select>
                    @error('status')
                    <span class="text-danger" role="alert">
                        <p>{{ $message }}</p>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row align-items-end">
            <div class="col-6">
                <label for="is_document">Ảnh đại diện</label>
                <input type="text" name="thumbnail" id="thumbnail"
                    class="form-control {{ $errors->has('thumbnail') ? 'is-invalid' : '' }}"
                    value="{{ old('thumbnail') }}" placeholder="Ảnh đại diện..." />
                @error('thumbnail')
                <span class="text-danger" role="alert">
                    <p>{{ $message }}</p>
                </span>
                @enderror
            </div>
            <div class="col-2">
                <button type="button" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Chọn ảnh
                </button>
            </div>
            <div class="col-4">
                <img src="/storage/staff/qR0tAFo3JqIsp2FVZeNHP4uwoZ0wMCwrJ6dtWFU1.jpg" alt="" class="image-courses">
            </div>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary col-1 m-3">Lưu lại</button>
            <a href="{{ route('manager.courses.index') }}" class="btn btn-danger col-1 m-3">Hủy</a>
        </div>
    </form>
</div>
@endsection
@push('scripts')
<script src="//cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
@endpush