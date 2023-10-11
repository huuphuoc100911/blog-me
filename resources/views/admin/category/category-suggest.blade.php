@extends('admin.layouts.layout')
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
            @if (session('create_success'))
                <div class="alert alert-success">
                    {{ session('create_success') }}
                </div>
            @endif
            <div class="card">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tiêu đề</th>
                                <th>Nhân viên</th>
                                <th>Hình ảnh</th>
                                <th>Mô tả</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($listSuggestCategory as $category)
                                <tr>
                                    <td><strong>{{ $category->title }}</strong></td>
                                    <td>{{ $category->staff->name }}</td>
                                    <td><img src="{{ $category->image_url }}" class="img-size" /></td>
                                    <td style="white-space: initial">
                                        {{ $category->description }}
                                    </td>
                                    <td onclick="handleApproveCategory({{ $category->id }})"
                                        id="status-category-{{ $category->id }}">
                                        @if ($category->is_accept === \App\Enums\CategoryAccept::ACCEPT)
                                            <span class="badge bg-label-success me-1">Phê duyệt</span>
                                        @else
                                            <span class="badge bg-label-warning me-1">Chờ phê duyệt</span>
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
                    {{ $listSuggestCategory->links('vendor.pagination.custom-pagination') }}
                </div>
            </div>
            <!--/ Basic Bootstrap Table -->
        </div>
        <!-- / Content -->
    @endsection
    @push('scripts')
        <script>
            function handleApproveCategory(categoryId) {
                $.ajax({
                    url: "{{ route('admin.category.approve') }}",
                    method: "GET",
                    data: {
                        categoryId: categoryId
                    },
                    success: function(data) {
                        $("#status-category-" + categoryId).html(data.status);
                        if (data.count > 0) {
                            $("#category-suggest-count").removeClass('hidden-danger');
                            $("#category-suggest-count").html(data.count);
                        } else {
                            $("#category-suggest-count").addClass('hidden-danger');
                        }
                    }
                });
            }
        </script>
    @endpush
