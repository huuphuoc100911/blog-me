@extends('admin.layouts.layout')
@section('page-title', 'Category')
@push('styles')
    <style>
        .btn-cat-del {
            margin-left: 10px;
        }

        .btn-cat-del-2 {
            margin-right: 20px; 
            margin-left: 10px;
        }
    </style>
@endpush
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="d-flex justify-content-space-around">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Category</h4>
                <a href=""><button class="btn btn-success">Add Category</button></a>
            </div>

            <!-- Examples -->
            <div class="row mb-5">
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card h-100">
                        <img class="card-img-top" src="/assets/admin/assets/img/elements/2.jpg" alt="Card image cap" />
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">
                                Some quick example text to build on the card title and make up the bulk of the card's
                                content.
                            </p>
                            <p class="card-text">
                                <small class="text-muted">Last updated 3 mins ago</small>
                            </p>
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('admin.category.edit', 1) }}" class="btn btn-primary">Edit</a>
                                <a href="javascript:void(0)" class="btn btn-danger btn-cat-del">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">
                                This is a wider card with supporting text below as a natural lead-in to additional content.
                                This
                                content is a little bit longer.
                            </p>
                            <p class="card-text">
                                <small class="text-muted">Last updated 3 mins ago</small>
                            </p>
                        </div>
                        <img class="card-img-bottom pb-3" src="/assets/admin/assets/img/elements/1.jpg" alt="Card image cap" />
                        <div class="d-flex justify-content-end pb-3">
                            <a href="{{ route('admin.category.edit', 1) }}" class="btn btn-primary">Edit</a>
                            <a href="javascript:void(0)" class="btn btn-danger btn-cat-del-2">Delete</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card h-100">
                        <img class="card-img-top" src="/assets/admin/assets/img/elements/2.jpg" alt="Card image cap" />
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">
                                Some quick example text to build on the card title and make up the bulk of the card's
                                content.
                            </p>
                            <a href="javascript:void(0)" class="btn btn-outline-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <h6 class="card-subtitle text-muted">Support card subtitle</h6>
                        </div>
                        <img class="img-fluid" src="/assets/admin/assets/img/elements/13.jpg" alt="Card image cap" />
                        <div class="card-body">
                            <p class="card-text">Bear claw sesame snaps gummies chocolate.</p>
                            <a href="javascript:void(0);" class="card-link">Card link</a>
                            <a href="javascript:void(0);" class="card-link">Another link</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <h6 class="card-subtitle text-muted">Support card subtitle</h6>
                            <img class="img-fluid d-flex mx-auto my-4" src="/assets/admin/assets/img/elements/4.jpg"
                                alt="Card image cap" />
                            <p class="card-text">Bear claw sesame snaps gummies chocolate.</p>
                            <a href="javascript:void(0);" class="card-link">Card link</a>
                            <a href="javascript:void(0);" class="card-link">Another link</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Examples -->
        </div>
        <!-- / Content -->
    @endsection
