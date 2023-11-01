@extends('staff.layouts.layout')
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
                <form class="d-flex row" action="{{ route('staff.media-table.index') }}">
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
            <div style="overflow-x:auto;">
                <table class="table table-striped table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Ngày cập nhật</th>
                            <th scope="col">Hoạt động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($medias as $key => $media)
                            <tr>
                                <td>{{ $media->title }}</td>
                                <td>
                                    <img src="{{ $media->image_url }}" style="width: 100px; height: 100px" />
                                </td>
                                <td>{{ $media->description }}</td>
                                <td>
                                    @if ($media->is_active)
                                        <p class="btn btn-success">Active</p>
                                    @else
                                        <p class="btn btn-danger">Inactive</p>
                                    @endif
                                </td>
                                <td>{{ $media->created_at }}</td>
                                <td>
                                    @if (auth('staff')->user()->id === $media->staff_id)
                                        <div class="d-flex justify-content-end">
                                            <a href="{{ route('staff.media.edit', $media->id) }}"
                                                class="btn btn-primary">Edit</a>
                                            <form action="{{ route('staff.media.destroy', $media->id) }}" method="post"
                                                style="display: inline-block;"
                                                onsubmit="return confirm('Do you want to delete it?')">
                                                <button type="submit" class="btn btn-danger btn-cat-del-2">Delete</button>
                                                @method('delete')
                                                @csrf
                                            </form>
                                        </div>
                                    @else
                                        <div class="d-flex justify-content-end">
                                            <button class="error-access btn btn-primary"
                                                style="margin-right: 20px">Edit</button>
                                            <button class="error-access btn btn-danger">Delete</button>
                                        </div>
                                    @endif
                                </td>

                            </tr>
                        @empty
                            <div class="text-center w-100 mt-5">{{ __('lang.no_record') }}</div>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center demo-inline-spacing">
                {{ $medias->links('vendor.pagination.custom-pagination') }}
            </div>
        </div>
        <div class="bs-toast toast toast-placement-ex m-2 fade bg-danger top-0 end-0 hide" role="alert"
            aria-live="assertive" aria-atomic="true" data-delay="2000">
            <div class="toast-header">
                <i class="bx bx-bell me-2"></i>
                <div class="me-auto fw-semibold">Cảnh báo</div>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body"><strong>Không thực hiện được!</strong> Bạn không phải là người tạo media.</div>
        </div>
        <div id="showToastPlacement"></div>
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
        <script src="/assets/admin/assets/js/ui-toasts.js"></script>
        <script>
            $(".error-access").click(function() {
                document.getElementById("showToastPlacement").click();
            })
        </script>
    @endpush
