@extends('admin.layouts.layout')
@section('page-title', __('lang.admin.medias.index'))
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
        \Carbon\Carbon::setLocale('vi');
        $now = \Carbon\Carbon::now();
    @endphp
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="d-flex cat-header">
                <h4 class="fw-bold py-3 mb-1">Hình ảnh</h4>
                {{-- <a href="{{ route('admin.media.create') }}" class="pt-3"><button class="btn btn-success">Add
                        Media</button></a> --}}
            </div>
            <div class="mb-5">
                <form class="d-flex row" action="{{ route('admin.media.index') }}">
                    <div class="col-4">
                        <input class="form-control me-2" value="{{ request()->search ?? '' }}" type="text"
                            placeholder="Tiêu đề, danh mục" name="search" />
                    </div>
                    <div class="col-3">
                        <select class="form-control rounded" name="category" onchange="this.form.submit()">
                            <option value="">
                                Tất cả
                            </option>
                            @forelse ($categories as $key => $category)
                                <option value="{{ $key }}" @if (isset(request()->category) && request()->category == $key) selected @endif>
                                    {{ Str::limit($category, 20, '...') }}
                                </option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <button class="btn btn-info col-2" type="submit">Tìm kiếm</button>
                </form>
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
            <div class="row mb-5" id="sortable">
                @forelse ($medias as $key => $media)
                    @if ($key % 2 == 0)
                        <div class="col-md-6 col-lg-4 mb-5 media-item" id="sort-{{ $media->id }}">
                            <div class="card h-100">
                                <img class="card-cat-img" src="{{ $media->image_url }}" alt="Card image cap" />
                                <div class="card-body cat-info">
                                    <h4 class="card-title text-danger">{{ $media->title }}
                                        <span onclick="changeStatusMedia({{ $media->id }})"
                                            id="status-media--{{ $media->id }}" style="float: right">
                                            @if ($media->is_active === 2)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </span>
                                    </h4>
                                    <p class="text-success">{{ $media->category->title }}</p>
                                    <p class="card-text">
                                        {{ Str::limit($media->description, 720, '...') }}
                                    </p>
                                    <p class="card-text">
                                        <small
                                            class="text-muted">{{ \Carbon\Carbon::parse($media->updated_at)->diffForHumans($now) }}
                                            bởi {{ $media->staff->name }}
                                        </small>
                                    </p>
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('admin.media.edit', $media->id) }}" class="btn btn-primary">Xem
                                            chi tiết</a>
                                        {{-- <form action="{{ route('admin.media.destroy', $media->id) }}" method="post"
                                            style="display: inline-block;"
                                            onsubmit="return confirm('Do you want to delete it?')">
                                            <button type="submit" class="btn btn-danger btn-cat-del-2">Delete</button>
                                            @method('delete')
                                            @csrf
                                        </form> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-md-6 col-xl-4" id="sort-{{ $media->id }}">
                            <div class="card mb-5">
                                <div class="card-body cat-info">
                                    <h4 class="card-title text-success">{{ $media->title }}
                                        <span onclick="changeStatusMedia({{ $media->id }})"
                                            id="status-media--{{ $media->id }}" style="float: right">
                                            @if ($media->is_active === 2)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </span>
                                    </h4>
                                    <p class="text-success">{{ $media->category->title }}</p>
                                    <p class="card-text">
                                        {{ Str::limit($media->description, 720, '...') }}
                                    </p>
                                    <p class="card-text">
                                        <small
                                            class="text-muted">{{ \Carbon\Carbon::parse($media->updated_at)->diffForHumans($now) }}
                                            bởi {{ $media->staff->name }}
                                        </small>
                                    </p>
                                </div>
                                <img class="card-cat-img pb-3" src="{{ $media->image_url }}" alt="Card image cap" />
                                <div class="d-flex justify-content-end pb-3">
                                    <a href="{{ route('admin.media.edit', $media->id) }}" class="btn btn-primary">Xem chi
                                        tiết</a>
                                    {{-- <form action="{{ route('admin.media.destroy', $media->id) }}" method="post"
                                        style="display: inline-block;"
                                        onsubmit="return confirm('Do you want to delete it?')">
                                        <button type="submit" class="btn btn-danger btn-cat-del-2">Delete</button>
                                        @method('delete')
                                        @csrf
                                    </form> --}}
                                </div>
                            </div>
                        </div>
                    @endif
                @empty
                    <div class="text-center w-100 mt-5">{{ __('lang.no_record') }}</div>
                @endforelse
            </div>
            <div class="d-flex justify-content-center demo-inline-spacing">
                {{ $medias->links('vendor.pagination.custom-pagination') }}
            </div>
            <!-- Examples -->
        </div>
        <!-- / Content -->
    @endsection
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#sortable').sortable({
                    update: function(event, ui) {
                        var data = $(this).sortable("serialize");
                        console.log(data);
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: "{{ route('admin.media.sort') }}",
                            data: data,
                            type: 'POST',
                            success: function(response) {
                                console.log(response);
                            }
                        });
                    }
                });
            });

            function changeStatusMedia(mediaId) {
                $.ajax({
                    url: "{{ route('admin.media.change-status-media') }}",
                    method: "GET",
                    data: {
                        mediaId: mediaId
                    },
                    success: function(data) {
                        console.log(data.status);
                        $("#status-media--" + mediaId).html(data.status)
                    }
                });
            }
        </script>
    @endpush
