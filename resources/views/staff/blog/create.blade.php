@extends('staff.layouts.layout')
@section('page-title', 'Create Media')
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
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Create Blog</h4>
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Blog</h5>
                        <small class="text-muted float-end">Create</small>
                    </div>
                    @if (session('create_fail'))
                        <div class="alert alert-danger mx-3">
                            <button type="button" data-dismiss="alert">×</button>
                            {{ session('create_fail') }}
                        </div>
                    @endif
                    <div class="card-body">
                        {!! Form::open(['method' => 'post', 'route' => 'staff.blog.store', 'files' => true, 'id' => 'create-form']) !!}
                        <div class="mb-3">
                            {{ Form::label('title', 'Title', ['class' => 'form-label']) }}
                            {{ Form::text('title', null, ['class' => 'form-control input-width-50', 'placeholder' => 'Enter your title']) }}
                            @error('title')
                                <span class="error text-danger" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            {{ Form::label('category', 'Category', ['class' => 'form-label']) }}
                            {!! Form::select('category_id', $categories, $categories ?? null, [
                                'class' => 'form-select form-control input-width-50',
                            ]) !!}
                        </div>
                        <div class="mb-3">
                            {{ Form::label('url_image', 'Photo', ['class' => 'form-label']) }}
                            {{ Form::file('url_image', ['class' => 'form-control input-width-50 upload-image', 'placeholder' => 'Enter your media name']) }}
                            <div class="image-upload"></div>
                            @error('url_image')
                                <span class="error text-danger" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            {{ Form::label('description', 'Description', ['class' => 'form-label']) }}
                            {!! Form::textarea('description', null, [
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
                            {{ Form::label('content', 'Content', ['class' => 'form-label']) }}
                            {!! Form::textarea('content', null, [
                                'class' => 'form-control input-width-50',
                                'placeholder' => 'Enter your content',
                                'id' => 'content',
                            ]) !!}
                            @error('content')
                                <span class="error text-danger" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            {{ Form::label('is_active', 'Status', ['class' => 'form-label']) }}
                            {!! Form::select('is_active', \App\Enums\MediaStatus::toSelectArray(), 2, [
                                'class' => 'form-select form-control input-width-50',
                            ]) !!}
                        </div>
                        {{ Form::submit('Create Blog', ['class' => 'btn btn-info mt-3']) }}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
@push('scripts')
    <script src="//cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

    <script type="text/javascript">
        $(function() {
            $(".upload-image").change(showPreviewImage);
        })

        CKEDITOR.replace('content');

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
