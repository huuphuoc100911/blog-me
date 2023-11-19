@extends('manager.layouts.layout')
@section('page-title', 'Sửa khóa học')
@push('styles')
<style>
    .image-courses {
        max-width: 100%;
        height: 200px;
    }

</style>
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sửa khóa học</h1>
    </div>
    <form action="{{ route('manager.courses.update', $course) }}" enctype="multipart/form-data" method="post" class="ml-3">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-4">
                <div class="mb-3">
                    <label for="name">Tên</label>
                    <input type="text" id="name" name="name" class="slug-origin form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') ?? $course->name }}" placeholder="Nhập tên" />
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
                    <input type="text" name="slug" id="slug" class="slug-render form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" value="{{ old('slug') ?? $course->slug }}" placeholder="Nhập slug" />
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
                    <input type="text" id="code" name="code" class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" value="{{ $course->code }}" placeholder="Nhập mã khóa học" />
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
                    <select name="category_id" id="category_id" class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}" value="{{ old('category_id') }}">
                        <option value="0">Chọn danh mục</option>
                        @foreach ($categories as $key => $category)
                        <option value="{{ $key }}" {{ (old('category_id') ?? $course->category_id) == $key ? 'selected'
                            : '' }}>{{ $category }}</option>
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
                    <select name="teacher_id" id="teacher_id" class="form-control {{ $errors->has('teacher_id') ? 'is-invalid' : '' }}" value="{{ old('teacher_id') }}">
                        <option value="0">Chọn giảng viên</option>
                        <option value="1" {{ (old('teacher_id') ?? $course->teacher_id) == 1 ? 'selected' : '' }}>Tạ
                            Hoàng An</option>
                        <option value="2" {{ (old('teacher_id') ?? $course->teacher_id) == 2 ? 'selected' : '' }}>Đặng
                            Hoàng Sơn</option>
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
                    <input type="text" name="price" id="price" class="form-control number-format {{ $errors->has('price') ? 'is-invalid' : '' }}" value="{{ old('price') ?? $course->price }}" placeholder="Nhập giá" />
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
                    <input type="text" name="sale_price" id="sale_price" class="form-control {{ $errors->has('sale_price') ? 'is-invalid' : '' }}" value="{{ old('sale_price') ?? $course->sale_price }}" placeholder="Nhập khuyến mãi" />
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
                    <textarea rows="3" type="text" name="description" id="description" class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" value="{{ old('description') ?? $course->description }}" placeholder="Nhập nội dung">{{ old('description') ?? $course->description }}</textarea>
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
                    <textarea rows="3" type="text" name="supports" id="supports" class="form-control ckeditor {{ $errors->has('supports') ? 'is-invalid' : '' }}" value="{{ old('supports') ?? $course->supports }}" placeholder="Nhập hỗ trợ">{{ old('supports') ?? $course->supports }}</textarea>
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
                    <select name="is_document" id="is_document" class="form-control {{ $errors->has('is_document') ? 'is-invalid' : '' }}" value="{{ old('is_document') ?? $course->is_document }}">
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
                    <select name="status" id="status" class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" value="{{ old('status') }}">
                        <option value="0" {{ (old('status') ?? $course->status) == 0 ? 'selected' : '' }}>Chưa ra mắt
                        </option>
                        <option value="1" {{ (old('status') ?? $course->status) == 1 ? 'selected' : '' }}>Đã ra mắt
                        </option>
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
                <label for="thumbnail" class="btn btn-primary">Cập nhật hình
                    nền</label>
                <input type="file" name="thumbnail" style="display:none" id="thumbnail" />
                @error('thumbnail')
                <span class="text-danger" role="alert">
                    <p>{{ $message }}</p>
                </span>
                @enderror
            </div>
            <div class="col-12 image-preview">
                <img src="{{ $course->thumbnail_url }}" alt="" class="image-viewer">
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
<script type="text/javascript">
    $(function() {
        $("#thumbnail").change(showPreviewImage);
    })

    function showPreviewImage(e) {
        $('.image-preview').html('');
        var $input = $(this);
        var inputFiles = this.files;
        if (inputFiles == undefined || inputFiles.length == 0) return;
        var inputFile = inputFiles[0];

        var reader = new FileReader();
        reader.onload = function(event) {
            let base64data = event.target.result;
            let html_append = `<img src="${base64data}" class="image-courses my-3" />`;
            $('.image-preview').append(html_append);
        };
        reader.onerror = function(event) {
            alert("I AM ERROR: " + event.target.error.code);
        };
        reader.readAsDataURL(inputFile);
    }

</script>
@endpush
