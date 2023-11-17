@extends('manager.layouts.layout')
@section('page-title', 'Sửa người dùng')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sửa người dùng</h1>
    </div>
    <form action="{{ route('manager.user.update', $manager) }}" method="post" class="ml-3">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="name">Tên</label>
                    <input type="text" id="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') ?? $manager->name }}" placeholder="Nhập tên" name="name" />
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
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('email') ?? $manager->email }}" placeholder="Nhập email" name="email" />
                    @error('email')
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
                    <label for="password">Mật khẩu</label>
                    <input type="password" id="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Nhập mật khẩu" name="password" />
                    @error('password')
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
                    <label for="group_id">Nhóm</label>
                    <select name="group_id" id="group_id" class="form-control {{ $errors->has('group_id') ? 'is-invalid' : '' }}" value="{{ old('group_id') ?? $manager->group_id }}">
                        <option value="0">Chọn nhóm</option>
                        <option value="1">Manager</option>
                    </select>
                    @error('group_id')
                    <span class="text-danger" role="alert">
                        <p>{{ $message }}</p>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary col-1 m-3">Lưu lại</button>
            <a href="{{ route('manager.user.index') }}" class="btn btn-danger col-1 m-3">Hủy</a>
        </div>
    </form>
</div>
@endsection
