@extends('staff.layouts.layout')
@section('page-title', 'Edit blog')
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
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Edit blog</h4>
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Blog</h5>
                        <small class="text-muted float-end">Edit</small>
                    </div>
                    @if (session('update_fail'))
                        <div class="alert alert-danger mx-3">
                            <button type="button" data-dismiss="alert">×</button>
                            {{ session('update_fail') }}
                        </div>
                    @endif
                    <div class="card-body">
                        {!! Form::open(['method' => 'PATCH', 'route' => ['staff.blog.update', $blog->id], 'files' => true]) !!}
                        <div class="mb-3">
                            {{ Form::label('title', 'Title', ['class' => 'form-label']) }}
                            {{ Form::text('title', $blog->title, ['class' => 'form-control input-width-50', 'placeholder' => 'Enter your title']) }}
                            @error('title')
                                <span class="error text-danger" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            {{ Form::label('category', 'Category', ['class' => 'form-label']) }}
                            {!! Form::select('category_id', $categories, $blog->category_id ?? null, [
                                'class' => 'form-select form-control input-width-50',
                            ]) !!}
                        </div>
                        <div class="mb-3">
                            {{ Form::label('url_image', 'Photo', ['class' => 'form-label']) }}
                            <br />
                            @if ($blog->url_image)
                                <img src="{{ $blog->image_url }}" class="add-image my-3" />
                            @endif
                            {{ Form::file('url_image', ['class' => 'form-control input-width-50 upload-image', 'placeholder' => 'Enter your blog name']) }}
                            <div class="image-upload"></div>
                            @error('url_image')
                                <span class="error text-danger" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            {{ Form::label('description', 'Description', ['class' => 'form-label']) }}
                            {!! Form::textarea('description', $blog->description, [
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
                            {!! Form::textarea('content', $blog->content, [
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
                            {!! Form::select('is_active', \App\Enums\BlogStatus::toSelectArray(), $blog->is_active, [
                                'class' => 'form-select form-control input-width-50',
                                'disabled' => 'disabled',
                            ]) !!}
                        </div>
                        {{ Form::hidden('is_active', $blog->is_active) }}
                        {{ Form::submit('Edit blog', ['class' => 'btn btn-info mt-3']) }}
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
