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

            <!-- Basic Bootstrap Table -->
            <div class="card">
                <h5 class="card-header">User</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($admins as $admin)
                                <tr>
                                    <td><strong>{{ $admin->name }}</strong></td>
                                    <td>{{ $admin->email }}</td>
                                    <td class="text-primary">
                                        Admin
                                    </td>
                                    <td>
                                        <span class="badge bg-label-success me-1">Active</span>
                                    </td>
                                </tr>
                            @endforeach
                            @foreach ($staffs as $staff)
                                <tr>
                                    <td><strong>{{ $staff->name }}</strong></td>
                                    <td>{{ $staff->email }}</td>
                                    <td class="text-text-info">
                                        Staff
                                    </td>
                                    <td onclick="changeStatusStaff({{ $staff->id }}, {{ $staff->is_active }})">
                                        @if ($staff->is_active == 2)
                                            <span class="badge bg-label-success me-1">Active</span>
                                        @else
                                            <span class="badge bg-label-danger me-1">Lock</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            @foreach ($users as $user)
                                <tr>
                                    <td><strong>{{ $user->name }}</strong></td>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-warning">
                                        User
                                    </td>
                                    <td>
                                        @if ($user->is_active == 2)
                                            <span class="badge bg-label-success me-1">Active</span>
                                        @else
                                            <span class="badge bg-label-danger me-1">Lock</span>
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
            function changeStatusStaff(staffId, isActive) {
                console.log(staffId);
                console.log(isActive);
            }
        </script>
    @endpush
