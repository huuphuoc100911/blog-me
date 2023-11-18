@extends('manager.layouts.layout')
@section('page-title', 'Sửa danh mục')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sửa danh mục</h1>
    </div>
    <form action="{{ route('manager.categories.update', $category) }}" method="post" class="ml-3">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="name">Tên</label>
                    <input type="text" id="name" class="slug-origin form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') ?? $category->name }}" placeholder="Nhập tên" name="name" />
                    @error('name')
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
                    <label for="slug">Slug</label>
                    <input type="slug" id="slug" class="slug-render form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" value="{{ old('slug') ?? $category->slug }}" placeholder="Nhập slug" name="slug" />
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
                    <label for="parent_id">Danh mục cha</label>
                    <select name="parent_id" id="parent_id" class="form-control {{ $errors->has('parent_id') ? 'is-invalid' : '' }}" value="{{ old('parent_id') ?? $category->parent_id }}">
                        <option value="0">Không</option>
                        {{ getCategories($categories, old('parent_id') ?? $category->parent_id) }}
                    </select>
                    @error('parent_id')
                    <span class="text-danger" role="alert">
                        <p>{{ $message }}</p>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary col-1 m-3">Lưu lại</button>
            <a href="{{ route('manager.categories.index') }}" class="btn btn-danger col-1 m-3">Hủy</a>
        </div>
    </form>
</div>
@endsection
