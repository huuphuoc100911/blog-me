@extends('staff.layouts.layout')
@section('page-title', 'Phân quyền')
@push('styles')
    <style>
    </style>
@endpush
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="d-flex cat-header">
                <h4 class="fw-bold py-3 mb-1">Phân quyền: {{ $group->name }}</h4>
            </div>
            @if (session('msg'))
                <div class="alert alert-success"> {{ session('msg') }}</div>
            @endif
            <div style="overflow-x:auto;">
                <form action="" method="post">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="20%">Module</th>
                                <th width="80%">Quyền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($modules as $module)
                                <tr>
                                    <td>{{ $module->title }}</td>
                                    <td>
                                        <div class="row">
                                            @if (isset($roleListArr))
                                                @foreach ($roleListArr as $roleName => $roleLabel)
                                                    <div class="col-2">
                                                        <label for="role_{{ $module->name }}_{{ $roleName }}">
                                                            <input type="checkbox" name="role[{{ $module->name }}][]"
                                                                id="role_{{ $module->name }}_{{ $roleName }}"
                                                                value="{{ $roleName }}"
                                                                {{ isRolePermission($roleGroup, $module->name, $roleName) ? 'checked' : '' }}>
                                                            {{ $roleLabel }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            @endif

                                            @if ($module->name == 'groups')
                                                <div class="col-2">
                                                    <label for="role_{{ $module->name }}_permission">
                                                        <input type="checkbox" name="role[{{ $module->name }}][]"
                                                            id="role_{{ $module->name }}_permission" value="permission"
                                                            {{ isRolePermission($roleGroup, $module->name, 'permission') ? 'checked' : '' }}>
                                                        Phân quyền
                                                    </label>
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <div class="text-center w-100">
                                    <h4 class="text-danger">{{ __('lang.no_record') }}</h4>
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                    @csrf
                    <button type="submit" class="btn btn-info">Phân quyền</button>
                </form>
            </div>
        </div>
    @endsection
    @push('scripts')
    @endpush
