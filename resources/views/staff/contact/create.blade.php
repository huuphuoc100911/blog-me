@extends('staff.layouts.layout')
@section('page-title', 'Gửi liên hệ')
@push('styles')
    <style>
        .input-width-50 {
            width: 50%;
        }

        .add-image {
            width: 200px;
            height: 200px;
        }
    </style>
@endpush
@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Đề xuất danh mục hình ảnh</h4>
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Danh mục hình ảnh</h5>
                        <small class="text-muted float-end">Tạo</small>
                    </div>
                    @if (session('create_fail'))
                        <div class="alert alert-danger mx-3">
                            <button type="button" data-dismiss="alert">×</button>
                            {{ session('create_fail') }}
                        </div>
                    @endif
                    <div class="card-body">
                        {!! Form::open([
                            'method' => 'post',
                            'route' => 'staff.post-contact-admin',
                            'files' => true,
                            'id' => 'create-form',
                            'class' => 'row',
                        ]) !!}
                        <div class="mb-1 col-12 col-md-6 mr-2">
                            {{ Form::label('title', 'Tên danh mục', ['class' => 'form-label']) }}
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class='bx bx-category'></i></span>
                                {{ Form::text('title', null, ['class' => 'form-control input-width-50', 'placeholder' => 'Enter your category name']) }}
                            </div>
                            @error('title')
                                <span class="error text-danger" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-1 col-12 col-md-6 mr-2">
                            {{ Form::label('url_image', 'Hình ảnh danh mục', ['class' => 'form-label']) }}
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class='bx bx-image-alt'></i></span>
                                {{ Form::file('url_image', ['class' => 'form-control input-width-50 upload-image', 'placeholder' => 'Enter your category name']) }}
                            </div>
                            <div class="image-upload"></div>
                            @error('url_image')
                                <span class="error text-danger" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-1 col-12 col-md-6 mr-2">
                            {{ Form::label('description', 'Mô tả danh mục', ['class' => 'form-label']) }}
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-message2" class="input-group-text"><i
                                        class='bx bx-detail'></i></span>
                                {!! Form::textarea('description', null, [
                                    'class' => 'form-control input-width-50',
                                    'placeholder' => 'Enter your description',
                                ]) !!}
                            </div>
                            @error('description')
                                <span class="error text-danger" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12"></div>
                        {{ Form::submit('Đề xuất danh mục', ['class' => 'col-2 btn btn-primary mt-3 ml-2']) }}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
@push('scripts')
    <script type="text/javascript">
        $(function() {
            $(".upload-image").change(showPreviewImage);
        })

        function showPreviewImage(e) {
            $('.image-upload').html('');
            var $input = $(this);
            var inputFiles = this.files;
            if (inputFiles == undefined || inputFiles.length == 0) return;
            var inputFile = inputFiles[0];

            var reader = new FileReader();
            reader.onload = function(event) {
                let base64data = event.target.result;
                let html_append = `<img src="${base64data}" class="add-image my-3" />`;
                $('.image-upload').append(html_append);
            };
            reader.onerror = function(event) {
                alert("I AM ERROR: " + event.target.error.code);
            };
            reader.readAsDataURL(inputFile);
        }
    </script>
@endpush
