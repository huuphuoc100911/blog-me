@extends('staff.layouts.layout')
@section('page-title', '403')
@push('styles')
@endpush
@section('content')
    @php
        \Carbon\Carbon::setLocale('vi');
        $now = \Carbon\Carbon::now();
    @endphp
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y m-5 text-center">
            <h3 class="text-danger">Bạn không có quyền truy cập.</h3>
            <a href="{{ URL::previous() }}">Quay lại</a>
        @endsection
