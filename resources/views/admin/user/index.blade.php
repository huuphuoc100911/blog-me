@extends('admin.layouts.layout')
@section('page-title', 'Category')
@push('styles')
    <style>

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
                <div class="col-7"></div>
                <div class="col-2">
                    <form action="{{ route('admin.downloadPdf') }}" method="get" class="my-3">
                        <button class="btn btn-info" type="submit">Download PDF</button>
                    </form>
                </div>
            </div>

            <!-- Basic Bootstrap Table -->
            <div class="card">
                <h5 class="card-header">User</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table" id="table-user">
                        <thead>
                            <tr>
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
                                        <form action="{{ route('admin.send-sms') }}" method="get">
                                            <button class="btn btn-success">Send SMS</button>
                                        </form>
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
        </script>
    @endpush
