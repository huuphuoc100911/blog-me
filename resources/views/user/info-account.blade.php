@extends('user.layouts.layout')
@push('styles')
    <style>
        body {
            background: rgb(99, 39, 120)
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8
        }

        .profile-button {
            background: rgb(99, 39, 120);
            box-shadow: none;
            border: none
        }

        .profile-button:hover {
            background: #682773
        }

        .profile-button:focus {
            background: #682773;
            box-shadow: none
        }

        .profile-button:active {
            background: #682773;
            box-shadow: none
        }

        .back:hover {
            color: #682773;
            cursor: pointer
        }

        .add-experience:hover {
            background: #BA68C8;
            color: #fff;
            cursor: pointer;
            border: solid 1px #BA68C8
        }

        .margin-label {
            margin-bottom: 0px !important;
        }
    </style>
@endpush
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bo-links">
                        <a href="{{ route('index') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Thông tin người dùng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <section class="contact-section mb-5">
        <div class="container">
            <div class="row">
                <div class="col-4 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                            width="150px"
                            src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span
                            class="font-weight-bold">Edogaru</span>
                        <span class="text-black-50">edogaru@mail.com.my</span>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Cập nhật
                                hình nền</button></div>
                    </div>
                </div>
                <div class="col-8 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Cập nhật thông tin</h4>
                        </div>
                        <form action="">
                            <div class="row">
                                <div class="col-12 col-md-6"><label style="margin-bottom: 2px">Họ và tên</label><input
                                        type="text" class="form-control" placeholder="Vui lòng nhập họ và tên"
                                        value=""></div>
                                <div class="col-12 col-md-6"><label style="margin-bottom: 2px">Ngày sinh</label><input
                                        type="date" class="form-control" value="" placeholder="dd-mm-yyyy"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 col-md-6"><label style="margin-bottom: 2px">Email</label>
                                    <input type="text" class="form-control" placeholder="Vui lòng nhập email"
                                        value="">
                                </div>
                                <div class="col-12 col-md-6"><label style="margin-bottom: 2px">Số điện
                                        thoại</label><input type="text" class="form-control" value=""
                                        placeholder="Vui lòng nhập số điện thoại"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12"><label style="margin-bottom: 2px">Địa chỉ</label>
                                    <input type="text" class="form-control" placeholder="Vui lòng nhập địa chỉ"
                                        value="">
                                </div>
                            </div>
                            <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Cập
                                    nhật thông tin</button></div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
    <!-- Contact Section End -->
@endsection
