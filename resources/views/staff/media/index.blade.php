@extends('staff.layouts.layout')
@section('page-title', 'Media')
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
        \Carbon\Carbon::setLocale('en');
        $now = \Carbon\Carbon::now();
    @endphp
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="d-flex cat-header">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Media</h4>
                <a href="{{ route('staff.media.create') }}" class="pt-3"><button class="btn btn-success">Add
                        Media</button></a>
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

            <!-- Examples -->
            <div class="row mb-5">
                @forelse ($medias as $key => $media)
                    @if ($key % 2 == 0)
                        <div class="col-md-6 col-lg-4 mb-5 media-item">
                            <div class="card h-100">
                                <img class="card-cat-img" src="{{ $media->image_url }}" alt="Card image cap" />
                                <div class="card-body cat-info">
                                    <h4 class="card-title text-danger">{{ $media->title }}</h4>
                                    <p class="card-text">
                                        {{ Str::limit($media->description, 720, '...') }}
                                    </p>
                                    <p class="card-text">
                                        <small
                                            class="text-muted">{{ \Carbon\Carbon::parse($media->updated_at)->diffForHumans($now) }}
                                            by {{ $media->media->name }}</small>
                                    </p>
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('staff.media.edit', $media->id) }}"
                                            class="btn btn-primary">Edit</a>
                                        <form action="{{ route('staff.media.destroy', $media->id) }}" method="post"
                                            style="display: inline-block;"
                                            onsubmit="return confirm('Do you want to delete it?')">
                                            <button type="submit" class="btn btn-danger btn-cat-del-2">Delete</button>
                                            @method('delete')
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-5">
                                <div class="card-body cat-info">
                                    <h4 class="card-title text-success">{{ $media->title }}</h4>
                                    <p class="card-text">
                                        {{ Str::limit($media->description, 720, '...') }}
                                    </p>
                                    <p class="card-text">
                                        <small
                                            class="text-muted">{{ \Carbon\Carbon::parse($media->updated_at)->diffForHumans($now) }}
                                            by {{ $media->media->name }}</small>
                                    </p>
                                </div>
                                <img class="card-cat-img pb-3" src="{{ $media->image_url }}" alt="Card image cap" />
                                <div class="d-flex justify-content-end pb-3">
                                    <a href="{{ route('staff.media.edit', $media->id) }}"
                                        class="btn btn-primary">Edit</a>
                                    <form action="{{ route('staff.media.destroy', $media->id) }}" method="post"
                                        style="display: inline-block;"
                                        onsubmit="return confirm('Do you want to delete it?')">
                                        <button type="submit" class="btn btn-danger btn-cat-del-2">Delete</button>
                                        @method('delete')
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @empty
                    <div class="text-center w-100 mt-5">There are no valid records</div>
                @endforelse
            </div>
            <div class="d-flex justify-content-center demo-inline-spacing">
                {{ $medias->links('vendor.pagination.custom-pagination') }}
            </div>
            <!-- Examples -->
        </div>
        <!-- / Content -->
    @endsection