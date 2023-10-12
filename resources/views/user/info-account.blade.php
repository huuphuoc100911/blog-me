@extends('user.layouts.layout')
@push('styles')
    <style>
        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8
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
                        <a href="{{ route('index') }}"><i class="fa fa-home"></i>{{ __('lang.home') }}</a>
                        <span>{{ __('lang.info_account') }}</span>
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
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <div class="avatar-image mb-2">
                            @if ($userProfile->image_url)
                                <img class="rounded-circle mt-3" style="width: 150px; max-height: 150px"
                                    src="{{ $userProfile->image_url }}">
                            @else
                                <img class="rounded-circle mt-3" width="150px"
                                    src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                            @endif
                        </div>
                        <span class="font-weight-bold">{{ $userProfile->name }}</span>
                        <span class="text-black-50">{{ $userProfile->email }}</span>
                        <div class="mt-5 text-center">
                            <label for="uploadAvatar" class="btn btn-primary profile-button">Cập nhật hình
                                nền</label>
                        </div>
                        {!! Form::open([
                            'method' => 'POST',
                            'route' => ['update-avatar'],
                            'files' => true,
                        ]) !!}
                        <input type="file" name="url_image" id="uploadAvatar" style="display: none"
                            onchange="this.form.submit()" />
                        {!! Form::close() !!}
                        @if (session('update_avatar_success'))
                            <div class="alert alert-success mx-3">
                                {{ session('update_avatar_success') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-8 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Cập nhật thông tin</h4>
                        </div>

                        {!! Form::open([
                            'method' => 'POST',
                            'route' => ['update-profile'],
                        ]) !!}
                        <div class="row">
                            <div class="col-12 col-md-6">
                                {{ Form::label('name', 'Họ và tên', ['class' => 'margin-label']) }}
                                {{ Form::text('name', $userProfile->name ?? null, ['class' => 'form-control', 'placeholder' => 'Vui lòng nhập họ và tên']) }}
                                @error('name')
                                    <span>
                                        <p class="error text-danger" role="alert">{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6">
                                {{ Form::label('birth_day', 'Ngày sinh', ['class' => 'margin-label']) }}
                                {{ Form::text('birth_day', $userProfile->birth_day ? \Carbon\Carbon::parse($userProfile->birth_day)->format('d-m-Y') : null, ['class' => 'form-control', 'id' => 'date-format', 'placeholder' => 'Vui lòng nhập ngày sinh']) }}
                                @error('birth_day')
                                    <span>
                                        <p class="error text-danger" role="alert">{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 col-md-6">
                                {{ Form::label('email', 'Email', ['class' => 'margin-label']) }}
                                {{ Form::text('email', $userProfile->email ?? null, ['class' => 'form-control', 'placeholder' => 'Vui lòng nhập email', 'disabled' => 'disable']) }}
                                @error('email')
                                    <span>
                                        <p class="error text-danger" role="alert">{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6">
                                {{ Form::label('phone_number', 'Số điện thoại', ['class' => 'margin-label']) }}
                                {{ Form::text('phone_number', $userProfile->phone_number ?? null, ['class' => 'form-control', 'placeholder' => 'Vui lòng nhập số điện thoại']) }}
                                @error('phone_number')
                                    <span>
                                        <p class="error text-danger" role="alert">{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                {{ Form::label('address', 'Địa chỉ', ['class' => 'margin-label']) }}
                                {{ Form::text('address', $userProfile->address ?? null, ['class' => 'form-control', 'placeholder' => 'Vui lòng nhập địa chỉ']) }}
                                @error('address')
                                    <span>
                                        <p class="error text-danger" role="alert">{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="row mt-3">
                            <div class="col-4">
                                <select class="form-select form-control mb-3" name="city" id="city"
                                    aria-label=".form-select-sm">
                                    <option value="" selected>Chọn tỉnh thành</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <select class="form-select form-control mb-3" name="district" id="district"
                                    aria-label=".form-select-sm">
                                    <option value="" selected>Chọn quận huyện</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <select class="form-select form-control" name="ward" id="ward"
                                    aria-label=".form-select-sm">
                                    <option value="" selected>Chọn phường xã</option>
                                </select>
                            </div>
                        </div> --}}
                        @if (session('update_success'))
                            <div class="alert alert-success mt-3">
                                {{ session('update_success') }}
                            </div>
                        @endif
                        <div class="text-center mt-5">
                            {{ Form::submit('Cập nhật thông tin', ['class' => 'btn btn-primary profile-button']) }}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
    </section>
    <!-- Contact Section End -->
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"
        integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/locales/bootstrap-datepicker.vi.min.js"
        integrity="sha512-o+RlJQ7OEtgCdvdgOJfjEASLgiLB9mA8bfWF4JnyA0cWHy7wtb4S4GRxgPor4iqKKLx0CoIFRcMecGnKSTTY1g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $(function() {
            $('#date-format').datepicker({
                format: 'dd-mm-yyyy',
                language: 'vi',
            })
        })
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script>
        var citis = document.getElementById("city");
        var districts = document.getElementById("district");
        var wards = document.getElementById("ward");
        var Parameter = {
            url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
            method: "GET",
            responseType: "application/json",
        };
        var promise = axios(Parameter);
        promise.then(function(result) {
            renderCity(result.data);
        });

        function renderCity(data) {
            for (const x of data) {
                citis.options[citis.options.length] = new Option(x.Name, x.Id);
            }
            citis.onchange = function() {
                console.log(this.value);
                district.length = 1;
                ward.length = 1;
                if (this.value != "") {
                    const result = data.filter(n => n.Id === this.value);

                    for (const k of result[0].Districts) {
                        district.options[district.options.length] = new Option(k.Name, k.Id);
                    }
                }
            };
            district.onchange = function() {
                ward.length = 1;
                const dataCity = data.filter((n) => n.Id === citis.value);
                if (this.value != "") {
                    const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

                    for (const w of dataWards) {
                        wards.options[wards.options.length] = new Option(w.Name, w.Id);
                    }
                }
            };
        }
    </script>
@endpush
