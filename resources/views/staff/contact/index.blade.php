@extends('staff.layouts.layout')
@section('page-title', 'Đề xuất')
@push('styles')
    <style>
        .img-size {
            width: 200px;
            height: 200px;
        }
    </style>
@endpush
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold">Danh sách đề xuất</h4>
            <!-- Basic Bootstrap Table -->
            <div class="d-flex pb-3">
                <a href="{{ route('staff.contact-admin') }}" class="pt-3"><button class="btn btn-success">Đề xuất danh mục
                        hình ảnh</button></a>
            </div>

            @if (session('create_success'))
                <div class="alert alert-success">
                    {{ session('create_success') }}
                </div>
            @endif
            <div class="card">
                <h5 class="card-header">User</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Hình ảnh</th>
                                <th>Mô tả</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($listSuggestCategory as $category)
                                <tr>
                                    <td><strong>{{ $category->title }}</strong></td>
                                    <td><img src="{{ $category->image_url }}" class="img-size" /></td>
                                    <td style="white-space: initial">
                                        {{ $category->description }}
                                    </td>
                                    <td>
                                        @if ($category->is_accept === \App\Enums\CategoryAccept::ACCEPT)
                                            <span class="badge bg-label-success me-1">Phê duyệt</span>
                                        @else
                                            <span class="badge bg-label-warning me-1">Chờ phê duyệt</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!--/ Basic Bootstrap Table -->
        </div>
        <!-- / Content -->
    @endsection
    @push('scripts')
        <script>
            function changeStatusStaff(staffId) {
                $.ajax({
                    url: "{{ route('admin.staff.change-status-staff') }}",
                    method: "GET",
                    data: {
                        staffId: staffId
                    },
                    success: function(data) {
                        $("#status-staff-" + staffId).html(data.status)
                    }
                });
            }
        </script>
    @endpush
