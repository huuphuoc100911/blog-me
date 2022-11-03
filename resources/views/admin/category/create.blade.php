@extends('admin.layouts.layout')
@section('page-title', 'Create Category')
@push('styles')
    <style>
        .input-width-50 {
            width: 50%;
        }
    </style>
@endpush
@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Create Category</h4>
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Category</h5>
                        <small class="text-muted float-end">Create</small>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                {{ Form::label('title', 'Category Name', ['class' => 'form-label']) }}
                                {{ Form::text('title', null, ['class' => 'form-control input-width-50', 'placeholder' => 'Enter your category name']) }}
                            </div>
                            <div class="mb-3">
                                {{ Form::label('url_image', 'Photo', ['class' => 'form-label']) }}
                                {{ Form::file('url_image', ['class' => 'form-control input-width-50', 'placeholder' => 'Enter your category name']) }}
                            </div>
                            <div class="mb-3">
                                {{ Form::label('description', 'Description', ['class' => 'form-label']) }}
                                {!! Form::textarea('description', null, [
                                    'class' => 'form-control input-width-50',
                                    'placeholder' => 'Enter your description',
                                ]) !!}
                            </div>
                            <div class="mb-3">
                                <label for="defaultSelect" class="form-label">Default select</label>
                                {{ Form::label('is_active', 'Active', ['class' => 'form-label']) }}
                                {!! Form::select('is_active', ['One', 'Two', 'Three'], [1, 2, 3], ['class' => 'form-select form-control input-width-50']) !!}
                            </div>
                            <button type="submit" class="btn btn-info mt-3">Create Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
