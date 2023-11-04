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

        .notify-danger {
            position: fixed;
            top: 100px;
            right: 100px;
        }

        .hidden-danger {
            display: none;
        }
    </style>
@endpush
@section('content')
    @php
        \Carbon\Carbon::setLocale('vi');
        $now = \Carbon\Carbon::now();
    @endphp
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="d-flex cat-header">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Blog Category</h4>
                @can('staff.blog_categories.add')
                    <a href="{{ route('staff.blog-category.create') }}" class="pt-3"><button class="btn btn-success">Add Blog
                            Category</button></a>
                @endcan
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
                @forelse ($blogCategories as $key => $category)
                    <div class="col-12 col-md-6 mb-5 category-item">
                        <div class="card h-100">
                            <img class="card-cat-img" src="{{ $category->image_url }}" alt="Card image cap" />
                            <div class="card-body cat-info">
                                <h4 class="card-title text-danger">{{ $category->title }}
                                    <span style="float: right">
                                        @if ($category->is_active === 2)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </span>
                                </h4>
                                <p class="card-text">
                                    {{ Str::limit($category->description, 720, '...') }}
                                </p>
                                <p class="card-text">
                                    <small
                                        class="text-muted">{{ \Carbon\Carbon::parse($category->updated_at)->diffForHumans($now) }}
                                        bởi {{ $category->staff->name }}</small>
                                </p>
                                <div class="row">
                                    <div class="col-sm-9"></div>
                                    <div class="col-sm-2">
                                        @can('staff.blog_categories.edit', $category->id)
                                            <a href="{{ route('staff.blog-category.edit', $category->id) }}"
                                                class="btn btn-primary">Edit</a>
                                        @endcan
                                        {{-- <button class="error-access btn btn-primary">Edit</button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center w-100 mt-5">{{ __('lang.no_record') }}</div>
                @endforelse
            </div>
            <div class="d-flex justify-content-center demo-inline-spacing">
                {{ $blogCategories->links('vendor.pagination.custom-pagination') }}
            </div>
            <div class="bs-toast toast toast-placement-ex m-2 fade bg-danger top-0 end-0 hide" role="alert"
                aria-live="assertive" aria-atomic="true" data-delay="2000">
                <div class="toast-header">
                    <i class="bx bx-bell me-2"></i>
                    <div class="me-auto fw-semibold">Cảnh báo</div>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body"><strong>Không thực hiện được!</strong> Bạn không phải là người tạo danh mục blog.
                </div>
            </div>
            <div id="showToastPlacement"></div>
            <!-- / Content -->
        @endsection
        @push('scripts')
            <script src="/assets/admin/assets/js/ui-toasts.js"></script>
            <script>
                $(".error-access").click(function() {
                    document.getElementById("showToastPlacement").click();
                })
            </script>
        @endpush
