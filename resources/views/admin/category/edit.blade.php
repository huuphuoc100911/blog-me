@extends('admin.layouts.layout')
@section('page-title', 'Edit Category')
@push('styles')
    <style>
        .input-width-50 {
            width: 50%;
        }
        .category-image {
            width: 200px;
            height: 200px;;
        }
    </style>
@endpush
@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Edit Category</h4>
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Category</h5>
                        <small class="text-muted float-end">Edit</small>
                    </div>
                    @if (session('update_fail'))
                    <div class="alert alert-danger mx-3">
                        <button type="button" data-dismiss="alert">×</button>
                        {{ session('update_fail') }}
                    </div>
                    @endif
                    <div class="card-body">
                        {!! Form::open(['method'=>'PATCH', 'route'=>['admin.category.update', $category->id], 'files' => true]) !!}
                            <div class="mb-3">
                                {{ Form::label('title', 'Category Name', ['class' => 'form-label']) }}
                                {{ Form::text('title', $category->title, ['class' => 'form-control input-width-50', 'placeholder' => 'Enter your category name']) }}
                                @error('title')
                                <span class="error text-danger" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                {{ Form::label('url_image', 'Photo', ['class' => 'form-label']) }}
                                <br/>
                                @if ($category->url_image)
                                    <img src="{{ $category->image_url }}" class="category-image m-3"/>
                                @endif
                                {{ Form::file('url_image', ['class' => 'form-control input-width-50', 'placeholder' => 'Enter your category name']) }}
                            </div>
                            <div class="mb-3">
                                {{ Form::label('description', 'Description', ['class' => 'form-label']) }}
                                {!! Form::textarea('description', $category->description, [
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
                                <label for="defaultSelect" class="form-label">Default select</label>
                                {{ Form::label('is_active', 'Active', ['class' => 'form-label']) }}
                                {!! Form::select('is_active', \App\Enums\CategoryStatus::toSelectArray(), $category->is_active, ['class' => 'form-select form-control input-width-50']) !!}
                            </div>
                            {{ Form::submit('Edit Category', ['class' => 'btn btn-info mt-3']) }}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
