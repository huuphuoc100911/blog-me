@extends('staff.layouts.layout')
@section('page-title', 'Category')
@push('styles')
    <style>
        .btn-cat-del {
            margin-left: 10px;
        }

        .btn-cat-del-2 {
            margin-right: 20px;
            margin-left: 10px;
        }

        .cat-header {
            justify-content: space-between;
        }

        .card-cat-img {
            height: 500px;
        }

        .cat-info {
            height: 450px;
        }
    </style>
@endpush
@section('content')
    @php
        \Carbon\Carbon::setLocale('en');
        $now = \Carbon\Carbon::now();
    @endphp
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="d-flex cat-header">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Category</h4>
            </div>

            @if (session('create_success'))
                <div class="alert alert-success">
                    {{ session('create_success') }}
                </div>
            @endif

            @if (session('update_success'))
                <div class="alert alert-success mx-3">
                    {{ session('update_success') }}
                </div>
            @endif

            @if (session('delete_success'))
                <div class="alert alert-success">
                    {{ session('delete_success') }}
                </div>
            @endif

            @if (session('delete_fail'))
                <div class="alert alert-danger mx-3">
                    {{ session('delete_fail') }}
                </div>
            @endif

            <!-- Examples -->
            <div class="row mb-5">
                @forelse ($categories as $key => $category)
                    <div class="col-12 col-md-6 mb-5 category-item">
                        <div class="card h-100">
                            <img class="card-cat-img" src="{{ $category->image_url }}" alt="Card image cap" />
                            <div class="card-body cat-info">
                                <h4 class="card-title text-danger">{{ $category->title }}</h4>
                                <p class="card-text">
                                    {{ Str::limit($category->description, 720, '...') }}
                                </p>
                                <p class="card-text">
                                    <small
                                        class="text-muted">{{ \Carbon\Carbon::parse($category->updated_at)->diffForHumans($now) }}
                                        by {{ $category->admin->name }}</small>
                                </p>
                                <div class="row">
                                    <div class="col-sm-9"></div>
                                    <div class="col-sm-3">
                                        <a href="{{ route('staff.category.show', $category->id) }}"
                                            class="btn btn-success">Show</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center w-100 mt-5">Không có dữ liệu.</div>
                @endforelse
            </div>
            <div class="d-flex justify-content-center demo-inline-spacing">
                {{ $categories->links('vendor.pagination.custom-pagination') }}
            </div>
            <!-- Examples -->
        </div>
        <!-- / Content -->
    @endsection
