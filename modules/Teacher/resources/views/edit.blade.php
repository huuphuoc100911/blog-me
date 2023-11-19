@extends('manager.layouts.layout')
@section('page-title', 'Sửa khóa học')
@push('styles')
<style>
    .image-teachers {
        max-width: 100%;
        height: 200px;
    }

    .list-category {
        max-height: 250px;
        overflow-y: auto
    }

</style>
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sửa khóa học</h1>
    </div>
    <form action="{{ route('manager.teachers.update', $teacher) }}" enctype="multipart/form-data" method="post" class="ml-3">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="name">Tên</label>
                    <input type="text" id="name" name="name"
                        class="slug-origin form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                        value="{{ old('name') ?? $teacher->name }}" placeholder="Nhập tên" />
                    @error('name')
                    <span class="text-danger" role="alert">
                        <p>{{ $message }}</p>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" id="slug"
                        class="slug-render form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}"
                        value="{{ old('slug') ?? $teacher->slug }}" placeholder="Nhập slug" />
                    @error('slug')
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
                    <label for="exp">Số năm kinh nghiệm</label>
                    <input type="number" name="exp" id="exp"
                        class="format-number-input form-control {{ $errors->has('exp') ? 'is-invalid' : '' }}"
                        value="{{ old('exp') ?? $teacher->exp }}" placeholder="Nhập số năm kinh nghiệm" />
                    @error('exp')
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
                        placeholder="Nhập nội dung">{{ old('description') ?? $teacher->description }}</textarea>
                    @error('description')
                    <span class="text-danger" role="alert">
                        <p>{{ $message }}</p>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row align-items-end">
            <div class="col-6">
                <label for="avatar" class="btn btn-primary">Cập nhật ảnh đại diện</label>
                <input type="file" name="avatar" style="display:none" id="avatar"/>
                @error('avatar')
                <span class="text-danger" role="alert">
                    <p>{{ $message }}</p>
                </span>
                @enderror
            </div>
            <div class="col-12 image-preview"></div>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary col-1 m-3">Lưu lại</button>
            <a href="{{ route('manager.teachers.index') }}" class="btn btn-danger col-1 m-3">Hủy</a>
        </div>
    </form>
</div>
@endsection
@push('scripts')
<script src="//cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(function() {
        $("#avatar").change(showPreviewImage);
    })

    function showPreviewImage(e) {
        console.log(23);
        $('.image-preview').html('');
        var $input = $(this);
        var inputFiles = this.files;
        if (inputFiles == undefined || inputFiles.length == 0) return;
        var inputFile = inputFiles[0];

        var reader = new FileReader();
        reader.onload = function(event) {
            let base64data = event.target.result;
            let html_append = `<img src="${base64data}" class="image-teachers my-3" />`;
            $('.image-preview').append(html_append);
        };
        reader.onerror = function(event) {
            alert("I AM ERROR: " + event.target.error.code);
        };
        reader.readAsDataURL(inputFile);
    }

</script>
@endpush
