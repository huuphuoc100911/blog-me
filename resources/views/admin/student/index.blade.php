@extends('admin.layouts.layout')
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

            @livewire('student')
        </div>
        <!-- / Content -->
    @endsection

    @push('scripts')
        <script>
            window.addEventListener('close-modal', event => {
                $('#student-modal').modal('hide');
                $('#update-student-modal').modal('hide');
                $('#delete-student-modal').modal('hide');
            })
        </script>
    @endpush
