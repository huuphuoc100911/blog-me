@extends('admin.layouts.layout')
@section('page-title', 'Dashboard')
@push('styles')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@endpush
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- Total Revenue -->
            <div class="col-12 order-2 order-md-3 order-lg-2 mb-4">
                <div class="card">
                    <div class="row row-bordered g-0">
                        <div class="col-md-12">
                            <h5 class="card-header m-0 me-2 pb-3">Total Revenue</h5>
                            <div id="bar-chart" class="px-2"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 order-2 order-md-3 order-lg-2 mb-4">
                <div class="card">
                    <div class="row row-bordered g-0">
                        <div class="col-md-12">
                            <h5 class="card-header m-0 me-2 pb-3">Total Revenue</h5>
                            <div id="area-chat" class="px-2"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Total Revenue -->
        </div>
    </div>
    <!-- / Content -->
@endsection
@push('scripts')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script>
        $(function() {

            // Create a Bar Chart with Morris
            var chartBar = Morris.Bar({
                element: 'bar-chart',
                data: [0, 0],
                xkey: 'date',
                ykeys: ['value'],
                labels: ['Media'],
            });

            // var chartArea = Morris.Area({
            //     element: 'area-chart',
            //     data: [0, 0],
            //     xkey: 'date',
            //     ykeys: ['value'],
            //     labels: ['Hello'],
            //     fillOpacity: 0.6,
            //     hideHover: 'auto',
            //     behaveLikeLine: true,
            //     resize: true,
            //     pointFillColors: ['#ffffff'],
            //     pointStrokeColors: ['black'],
            // });

            $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: @json(config('app.url')) + "/api/v1/stastic-media",
                })
                .done(function(data) {
                    chartBar.setData(data);
                    // chartArea.setData(data);
                })
                .fail(function() {
                    alert("error occured");
                });
        });
    </script>
@endpush
