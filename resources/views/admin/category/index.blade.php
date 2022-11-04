@extends('admin.layouts.layout')
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
            <a href="{{ route('admin.category.create') }}" class="pt-3"><button class="btn btn-success">Add Category</button></a>
        </div>

        @if (session('create_success'))
        <div class="alert alert-success">
            {{ session('create_success') }}
        </div>
        @endif

        @if (session('edit_success'))
        <div class="alert alert-success">
            {{ session('edit_success') }}
        </div>
        @endif

        <!-- Examples -->
        <div class="row mb-5">
            @forelse ($categories as $key => $category)
            @if ($key % 2 == 0)
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card h-100">
                    <img class="card-cat-img" src="{{ $category->url_image }}" alt="Card image cap" />
                    <div class="card-body">
                        <h5 class="card-title">{{ $category->title }}</h5>
                        <p class="card-text">
                            {{ $category->description }}
                        </p>
                        <p class="card-text">
                            <small class="text-muted">{{ \Carbon\Carbon::parse($category->updated_at)->diffForHumans($now) }}</small>
                        </p>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                            <a href="javascript:void(0)" class="btn btn-danger btn-cat-del">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $category->title }}</h5>
                        <p class="card-text">
                            {{ $category->description }}
                        </p>
                        <p class="card-text">
                            <small class="text-muted">{{ \Carbon\Carbon::parse($category->updated_at)->diffForHumans($now) }}</small>
                        </p>
                    </div>
                    <img class="card-cat-img pb-3" src="{{ $category->url_image }}" alt="Card image cap" />
                    <div class="d-flex justify-content-end pb-3">
                        <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                        <a href="javascript:void(0)" class="btn btn-danger btn-cat-del-2">Delete</a>
                    </div>
                </div>
            </div>
            @endif
            @empty
            <div class="text-center w-100 mt-5">Khong co record</div>
            @endforelse
        </div>
        <!-- Examples -->
    </div>
    <!-- / Content -->
    @endsection