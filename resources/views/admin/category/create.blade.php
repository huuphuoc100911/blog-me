@extends('admin.layouts.layout')
@section('page-title', __('lang.admin.image_categories.image_category_create'))
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
        <h4 class="fw-bold py-3 mb-4">{{ __('lang.admin.image_categories.image_category_create') }}</h4>
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">{{ __('lang.admin.image_categories.index') }}</h5>
                        <small class="text-muted float-end">{{ __('lang.create') }}</small>
                    </div>
                    @if (session('create_fail'))
                        <div class="alert alert-danger mx-3">
                            <button type="button" data-dismiss="alert">×</button>
                            {{ session('create_fail') }}
                        </div>
                    @endif
                    <div class="card-body">
                        {!! Form::open(['method' => 'post', 'route' => 'admin.category.store', 'files' => true, 'id' => 'create-form']) !!}
                        <div class="mb-3">
                            {{ Form::label('title', __('lang.admin.image_categories.category_name'), ['class' => 'form-label']) }}
                            {{ Form::text('title', null, ['class' => 'form-control input-width-50', 'placeholder' => __('lang.enter_name')]) }}
                            @error('title')
                                <span class="error text-danger" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            {{ Form::label('url_image', __('lang.image'), ['class' => 'form-label']) }}
                            {{ Form::file('url_image', ['class' => 'form-control input-width-50 upload-image', 'placeholder' => 'Enter your category name']) }}
                            <div class="image-upload"></div>
                            @error('url_image')
                                <span class="error text-danger" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            {{ Form::label('description', __('lang.description'), ['class' => 'form-label']) }}
                            {!! Form::textarea('description', null, [
                                'class' => 'form-control input-width-50',
                                'placeholder' => __('lang.enter_description'),
                            ]) !!}
                            @error('description')
                                <span class="error text-danger" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            {{ Form::label('is_active', __('lang.status'), ['class' => 'form-label']) }}
                            {!! Form::select('is_active', \App\Enums\CategoryStatus::toSelectArray(), 2, [
                                'class' => 'form-select form-control input-width-50',
                            ]) !!}
                        </div>
                        {{ Form::submit(__('lang.create'), ['class' => 'btn btn-info mt-3']) }}
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
