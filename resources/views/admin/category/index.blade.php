@extends('admin.layouts.layout')
@section('page-title', __('lang.admin.image_categories.index'))
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endpush
@section('content')
    @php
        \Carbon\Carbon::setLocale(session('locale'));
        $now = \Carbon\Carbon::now();
    @endphp
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="d-flex cat-header">
                <h4 class="fw-bold py-3 mb-4">{{ __('lang.admin.image_categories.index') }}</h4>
                <a href="{{ route('admin.category.create') }}" class="pt-3"><button
                        class="btn btn-success">{{ __('lang.create') }}</button></a>
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
                    <div class="col-md-6 col-12 mb-5 category-item">
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
                                        {{ __('lang.by') }}
                                        {{ $category->staff ? $category->staff->name : $category->admin->name }}</small>
                                </p>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-3">
                                        <a href="{{ route('admin.category.show', $category->id) }}"
                                            class="btn btn-success">{{ __('lang.show') }}</a>
                                    </div>
                                    <div class="col-sm-3">
                                        <a href="{{ route('admin.category.edit', $category->id) }}"
                                            class="btn btn-primary">{{ __('lang.update') }}</a>
                                    </div>
                                    <div class="col-sm-3">
                                        <button type="submit" class="btn btn-danger" data-id="{{ $category->id }}"
                                            data-toggle="modal"
                                            data-target="#delete-course-modal">{{ __('lang.delete') }}</button>
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
                {{ $categories->links('vendor.pagination.custom-pagination') }}
            </div>
            <!-- Examples -->
        </div>
        <!-- / Content -->
        <form class="hidden" name="delete-course-form" method="post">
            @method('delete')
            @csrf
        </form>
        <!-- Modal -->
        <div class="modal fade" id="delete-course-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Xóa danh mục hình ảnh?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Bạn có chắc chắn muốn xóa danh mục hình ảnh không?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="delete-course">Xóa bỏ</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
        <script>
            $(function() {
                var courseId;
                var btnDeleteCourse = document.getElementById('delete-course');
                var deleteCourseForm = document.forms['delete-course-form'];

                $('#delete-course-modal').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget)
                    courseId = button.data('id')
                })

                btnDeleteCourse.onclick = function() {
                    deleteCourseForm.action = '/admin/category/' + courseId;
                    deleteCourseForm.submit();
                }
            })
        </script>
    @endpush
