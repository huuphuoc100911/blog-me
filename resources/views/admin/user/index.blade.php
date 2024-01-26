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
            <div class="row">
                <div class="col-3">
                    <form action="{{ route('admin.send-mail-staff') }}" method="get" class="my-3">
                        <button class="btn btn-success" type="submit">Gửi email cho nhân viên</button>
                    </form>
                </div>
                <div class="col-4"></div>
                <div class="col-3 my-3">
                    <a href="{{ route('admin.staff-delete') }}" class="btn btn-secondary">Danh sách nhân viên đã xóa</a>
                </div>
                <div class="col-2">
                    <form action="{{ route('admin.downloadPdf') }}" method="get" class="my-3">
                        <button class="btn btn-info" type="submit">Download PDF</button>
                    </form>
                </div>
            </div>

            <!-- Basic Bootstrap Table -->
            <form class="card" name="container-form" method="POST" action="{{ route('admin.handle-delete-staff') }}">
                <h5 class="card-header">User</h5>
                <div class="d-flex m-3 align-items-center">
                    @csrf
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="checkbox-all">
                        <label class="form-check-label" for="checkbox-all">Chọn tất cả</label>
                    </div>
                    <div class="form-group">
                        <select class="form-control form-control-sm select-all-checkbox" name="action" id="action-select">
                            <option value=""><--Hành động--></option>
                            <option value="delete">Xóa</option>
                        </select>
                    </div>
                    <button class="btn btn-danger btn-sm btn-check-submit" disabled>Thực hiện</button>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table" id="table-user">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Ngày tạo</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Send Phone</th>
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
                                    <td class="user-status" onclick="changeStatusStaff({{ $staff->id }})"
                                        id="status-staff-{{ $staff->id }}">
                                        @if ($staff->is_active == 2)
                                            <span class="badge bg-label-success me-1">Active</span>
                                        @else
                                            <span class="badge bg-label-danger me-1">Lock</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.send-sms') }}" class="btn btn-success">
                                            Send SMS
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </form>
            <!--/ Basic Bootstrap Table -->
            @livewire('search')
        </div>
        <!-- / Content -->
    @endsection
    @push('scripts')
        <script>
            $(function() {
                new DataTable('#table-user', {
                    paging: false,
                    info: false,
                    // ordering: false,
                    // searching: false,
                    // scrollX: true,
                    // scrollY: 200,
                    columnDefs: [{
                        target: 3,
                        orderable: false,
                        searchable: false
                    }, {
                        target: 4,
                        orderable: false,
                        searchable: false
                    }, {
                        target: 5,
                        orderable: false,
                        searchable: false
                    }]
                });
            })

            function changeStatusStaff(staffId) {
                $.ajax({
                    url: "{{ route('admin.staff.change-status-staff') }}",
                    method: "GET",
                    data: {
                        staffId: staffId
                    },
                    success: function(data) {
                        $("#status-staff-" + staffId).html(data.status);
                        if (data.count > 0) {
                            $("#user-lock-count").removeClass('hidden-danger');
                            $("#user-lock-count").html(data.count);
                        } else {
                            $("#user-lock-count").addClass('hidden-danger');
                        }
                    }
                });
            }

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
