@extends('manager.layouts.layout')
@section('page-title', 'Thêm người dùng')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Thêm người dùng</h1>
    </div>
    <form action="" method="post" class="ml-3">
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="name">Tên</label>
                    <input type="text" id="name" class="form-control" placeholder="Nhập tên" name="name" />
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control" placeholder="Nhập email" name="email" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="password">Mật khẩu</label>
                    <input type="password" id="password" class="form-control" placeholder="Nhập mật khẩu" name="password" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="group_id">Nhóm</label>
                    <select name="group_id" id="group_id" class="form-control">
                        <option value="">Chọn nhóm</option>
                    </select>
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
