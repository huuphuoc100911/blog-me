@extends('admin.layouts.layout')
@section('page-title', __('lang.admin.staffs.index'))
@push('styles')
    <style>
        .select-all-checkbox {
            width: 160px;
            margin: 0 16px;
        }
    </style>
@endpush
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> User management</h4>
            @if (session('send_email_success'))
                <div class="alert alert-success mx-3">
                    {{ session('send_email_success') }}
                </div>
            @endif
            @if (session('send_email_fail'))
                <div class="alert alert-danger mx-3">
                    {{ session('send_email_fail') }}
                </div>
            @endif
            <div class="row mb-3">
                <div class="col-3">
                    <a href="{{ route('admin.user.index') }}" class="btn btn-info">Danh sách nhân viên</a>
                </div>
            </div>

            <!-- Basic Bootstrap Table -->
            <form class="card" name="container-form" method="POST" action="{{ route('admin.handle-restores-staff') }}">
                <h5 class="card-header">Staff deleted</h5>
                <div class="d-flex m-3 align-items-center">
                    @csrf
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="checkbox-all">
                        <label class="form-check-label" for="checkbox-all">Chọn tất cả</label>
                    </div>
                    <div class="form-group">
                        <select class="form-control form-control-sm select-all-checkbox" name="action" id="action-select">
                            <option value=""><--Hành động--></option>
                            <option value="restore">Khôi phục</option>
                        </select>
                    </div>
                    <button class="btn btn-danger btn-sm btn-check-submit" disabled>Thực hiện</button>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table" id="table-user">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Ngày tạo</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($staffs as $staff)
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="staffIds[]"
                                                value="{{ $staff->id }}">
                                        </div>
                                    </td>
                                    <td><strong>{{ $staff->name }}</strong></td>
                                    <td>{{ $staff->email }}</td>
                                    <td>{{ $staff->created_time }}</td>
                                    <td class="text-text-info">
                                        Staff
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </form>
            <!--/ Basic Bootstrap Table -->
        </div>
        <!-- / Content -->
    @endsection
    @push('scripts')
        <script>
            var checkboxAll = $('#checkbox-all');
            var courseItemCheckbox = $('input[name="staffIds[]"]');
            var checkAllSubmitBtn = $('.btn-check-submit');
            var containerForm = document.forms['container-form'];
            var actionSelect = $('#action-select');

            // Re-render check all submit button
            function renderCheckAllSubmitBtn() {
                var checkedCount = $('input[name="staffIds[]"]:checked').length > 0;
                var selectAction = $('#action-select').val() != '';
                if (checkedCount && selectAction) {
                    checkAllSubmitBtn.attr('disabled', false);
                } else {
                    checkAllSubmitBtn.attr('disabled', true);
                }
            }

            // Checkbox all changed
            checkboxAll.change(function() {
                var isCheckAll = $(this).prop("checked");
                courseItemCheckbox.prop("checked", isCheckAll);
                renderCheckAllSubmitBtn();
            })

            // Course item checkbox changed
            courseItemCheckbox.change(function() {
                var isCheckAll = courseItemCheckbox.length === $('input[name="staffIds[]"]:checked').length;
                checkboxAll.prop('checked', isCheckAll);
                renderCheckAllSubmitBtn();
            })

            // Change Action Submit
            actionSelect.change(function() {
                renderCheckAllSubmitBtn();
            })

            // Check all submit button click
            checkAllSubmitBtn.click(function(e) {
                containerForm.submit();
            })
        </script>
    @endpush
