@extends('staff.layouts.layout')
@section('page-title', 'Information Staff')
@push('styles')
    <style>
        .input-width-50 {
            width: 50%;
        }

        .category-image {
            width: 200px;
            height: 200px;
            ;
        }
    </style>
@endpush
@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span>Staff Information Settings</h4>
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Staff Information</h5>
                        <small class="text-muted float-end">
                            @if (!$infoStaff)
                                Create
                            @else
                                Edit
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
                            'route' => ['staff.info-staff.update', auth('staff')->user()->id],
                            'files' => true,
                        ]) !!}
                        {{ Form::hidden('id', $infoStaff ? $infoStaff->staff_id : 0) }}
                        <div class="mb-3">
                            {{ Form::label('name', 'Staff Name', ['class' => 'form-label']) }}
                            {{ Form::text('name', $infoStaff ? $infoStaff->name : null, ['class' => 'form-control input-width-50', 'placeholder' => 'Enter your staff name']) }}
                            @error('name')
                                <span class="error text-danger" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            {{ Form::label('url_image', 'Photo', ['class' => 'form-label']) }}
                            <br />
                            @if ($infoStaff)
                                <img src="{{ $infoStaff->image_url }}" class="category-image m-3" />
                            @endif
                            {{ Form::file('url_image', ['class' => 'form-control input-width-50', 'placeholder' => 'Enter your name']) }}
                            @error('url_image')
                                <span class="error text-danger" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            {{ Form::label('description', 'Description', ['class' => 'form-label']) }}
                            {!! Form::textarea('description', $infoStaff ? $infoStaff->description : null, [
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
                            {{ Form::label('email', 'Staff Email', ['class' => 'form-label']) }}
                            {{ Form::text('email', $infoStaff ? $infoStaff->email : null, ['class' => 'form-control input-width-50', 'placeholder' => 'Enter your staff email']) }}
                            @error('email')
                                <span class="error text-danger" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            {{ Form::label('Phone', 'Staff Phone', ['class' => 'form-label']) }}
                            {{ Form::text('phone', $infoStaff ? $infoStaff->phone : null, ['class' => 'form-control input-width-50', 'placeholder' => 'Enter your staff phone number']) }}
                            @error('phone')
                                <span class="error text-danger" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            {{ Form::label('link_facebook', 'Staff Facebook', ['class' => 'form-label']) }}
                            {{ Form::text('link_facebook', $infoStaff ? $infoStaff->link_facebook : null, ['class' => 'form-control input-width-50', 'placeholder' => 'Enter your facebook staff link']) }}
                            @error('link_facebook')
                                <span class="error text-danger" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        {{ Form::submit('Save', ['class' => 'btn btn-info mt-3']) }}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
