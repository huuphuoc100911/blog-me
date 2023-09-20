@extends('staff.layouts.layout')
@section('page-title', 'Blog')
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
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Blogs</h4>
                <a href="{{ route('staff.blog.create') }}" class="pt-3">
                    <button class="btn btn-success">Add Blog</button>
                </a>
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
                @forelse ($blogs as $key => $blog)
                    <div class="col-md-6 col-lg-4 mb-5 blog-item">
                        <div class="card h-100">
                            <img class="card-cat-img" src="{{ $blog->image_url }}" alt="Card image cap" />
                            <div class="card-body cat-info">
                                <h4 class="card-title text-danger">{{ $blog->title }}</h4>
                                <p class="text-success">{{ $blog->category->title }}</p>
                                <p class="card-text">
                                    {{ Str::limit($blog->description, 720, '...') }}
                                </p>
                                <p class="card-text">
                                    <small
                                        class="text-muted">{{ \Carbon\Carbon::parse($blog->updated_at)->diffForHumans($now) }}
                                        by {{ $blog->staff->name }}
                                    </small>
                                </p>
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('staff.blog.edit', $blog->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('staff.blog.destroy', $blog->id) }}" method="post"
                                        style="display: inline-block;"
                                        onsubmit="return confirm('Do you want to delete it?')">
                                        <button type="submit" class="btn btn-danger btn-cat-del-2">Delete</button>
                                        @method('delete')
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center w-100 mt-5">There are no valid records</div>
                @endforelse
            </div>
            <div class="d-flex justify-content-center demo-inline-spacing">
                {{ $blogs->links('vendor.pagination.custom-pagination') }}
            </div>
            <!-- Examples -->
        </div>
        <!-- / Content -->
    @endsection
