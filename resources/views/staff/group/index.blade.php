@extends('staff.layouts.layout')
@section('page-title', __('lang.admin.medias.index'))
@push('styles')
    <style>
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
                <h4 class="fw-bold py-3 mb-1">Nhóm người dùng</h4>
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
                            <th scope="col">#</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Phân quyền</th>
                            <th scope="col">Ngày tạo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($groups as $key => $group)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $group->name }}</td>
                                <td><a href="{{ route('staff.group.permission', $group) }}"
                                        class="btn btn-primary text-white">Phân quyền</a></td>
                                <td>{{ $group->updated_at }}</td>
                            </tr>
                        @empty
                            <div class="text-center w-100">
                                <h4 class="text-danger">{{ __('lang.no_record') }}</h4>
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center demo-inline-spacing">
                {{ $groups->links('vendor.pagination.custom-pagination') }}
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
