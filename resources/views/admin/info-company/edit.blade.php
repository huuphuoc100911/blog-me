@extends('admin.layouts.layout')
@section('page-title', __('lang.admin.info_companies.index'))
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
        <h4 class="fw-bold py-3 mb-4">{{ __('lang.admin.info_companies.company_info_update') }}</h4>
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">{{ __('lang.admin.info_companies.index') }}</h5>
                        <small class="text-muted float-end">
                            @if (!$infoCompany)
                                {{ __('lang.create') }}
                            @else
                                {{ __('lang.update') }}
                            @endif
                        </small>
                    </div>
                    @if (session('update_fail'))
                        <div class="alert alert-danger mx-3">
                            <button type="button" data-dismiss="alert">×</button>
                            {{ session('update_fail') }}
                        </div>
                    @endif
                    @if (session('update_success'))
                        <div class="alert alert-success mx-3">
                            {{ session('update_success') }}
                        </div>
                    @endif
                    <div class="card-body">
                        {!! Form::open([
                            'method' => 'PATCH',
                            'route' => ['admin.info-company.update', $infoCompany ? $infoCompany->id : 0],
                            'files' => true,
                        ]) !!}
                        {{ Form::hidden('id', $infoCompany ? $infoCompany->id : 0) }}
                        <div class="mb-3">
                            {{ Form::label('name', __('lang.admin.info_companies.company_name'), ['class' => 'form-label']) }}
                            {{ Form::text('name', $infoCompany ? $infoCompany->name : null, ['class' => 'form-control input-width-50', 'placeholder' => 'Enter your company name']) }}
                            @error('name')
                                <span class="error text-danger" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            {{ Form::label('url_image', __('lang.image'), ['class' => 'form-label']) }}
                            <br />
                            @if ($infoCompany)
                                <img src="{{ $infoCompany->image_url }}" class="add-image my-3" />
                            @endif
                            {{ Form::file('url_image', ['class' => 'form-control input-width-50 upload-image', 'placeholder' => 'Enter your name']) }}
                            <div class="image-upload"></div>
                            @error('url_image')
                                <span class="error text-danger" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            {{ Form::label('address', __('lang.address'), ['class' => 'form-label']) }}
                            {{ Form::text('address', $infoCompany ? $infoCompany->address : null, ['class' => 'form-control input-width-50', 'placeholder' => 'Enter your company address']) }}
                            @error('address')
                                <span class="error text-danger" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            {{ Form::label('description', __('lang.description'), ['class' => 'form-label']) }}
                            {!! Form::textarea('description', $infoCompany ? $infoCompany->description : null, [
                                'class' => 'form-control input-width-50',
                                'placeholder' => 'Enter your description',
                            ]) !!}
                            @error('description')
                                <span class="error text-danger" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            {{ Form::label('email', __('lang.email'), ['class' => 'form-label']) }}
                            {{ Form::text('email', $infoCompany ? $infoCompany->email : null, ['class' => 'form-control input-width-50', 'placeholder' => 'Enter your company email']) }}
                            @error('email')
                                <span class="error text-danger" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            {{ Form::label('Phone', __('lang.phone'), ['class' => 'form-label']) }}
                            {{ Form::text('phone', $infoCompany ? $infoCompany->phone : null, ['class' => 'form-control input-width-50', 'placeholder' => 'Enter your company phone number']) }}
                            @error('phone')
                                <span class="error text-danger" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            {{ Form::label('link_facebook', __('lang.facebook'), ['class' => 'form-label']) }}
                            {{ Form::text('link_facebook', $infoCompany ? $infoCompany->link_facebook : null, ['class' => 'form-control input-width-50', 'placeholder' => 'Enter your facebook company link']) }}
                            @error('link_facebook')
                                <span class="error text-danger" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        {{ Form::submit(__('lang.update'), ['class' => 'btn btn-info mt-3']) }}
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
