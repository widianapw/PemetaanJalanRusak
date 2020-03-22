<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{URL::asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link href="{{URL::asset('assets/vendor/fonts/circular-std/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('assets/libs/css/style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    {{-- <link rel="stylesheet" href="{{URL::asset('assets/vendor/charts/chartist-bundle/chartist.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/vendor/charts/morris-bundle/morris.css')}}"> --}}
    <link rel="stylesheet"
        href="{{URL::asset('assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/vendor/charts/c3charts/c3.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/vendor/fonts/flag-icon-css/flag-icon.min.css')}}">
    <title>@yield('title')</title>
</head>

<body>
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="/">SIG</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        @if(!Auth::user())
            @include('layouts/sidebar_user')
        @else
            @if(Auth::user()->user_role == "admin")
                @include('layouts/sidebar_admin')
            @else
                @include('layouts/sidebar_user')
            @endif
        @endif
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">@yield('judul')</h5>
                                <div class="card-body">
                                    <!-- ============================================================== -->
                                    <!-- pageheader  -->
                                    <!-- ============================================================== -->
                                    @yield('content')
                                    <!-- ============================================================== -->
                                    <!-- end pageheader  -->
                                    <!-- ============================================================== -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">@yield('judul')</h5>
                                <div class="card-body">
                                    <!-- ============================================================== -->
                                    <!-- pageheader  -->
                                    <!-- ============================================================== -->
                                    @yield('content1')
                                    <!-- ============================================================== -->
                                    <!-- end pageheader  -->
                                    <!-- ============================================================== -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            {{-- <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                             Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->


    
    <script src="{{URL::asset('assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
    <!-- bootstap bundle js -->
    <script src="{{URL::asset('assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
    <!-- slimscroll js -->
    <script src="{{URL::asset('assets/vendor/slimscroll/jquery.slimscroll.js')}}"></script>
    <!-- main js -->
    <script src="{{URL::asset('assets/libs/js/main-js.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC4Kci4iYfmBJ0_DOJDE-UOEOyHVi6pv4&callback=initMap" async
    defer></script>
    @yield('javascript')
    {{-- <!-- chart chartist js -->
    <script src="{{URL::asset('assets/vendor/charts/chartist-bundle/chartist.min.js')}}"></script>
    <!-- sparkline js -->
    <script src="{{URL::asset('assets/vendor/charts/sparkline/jquery.sparkline.js')}}"></script>
    <!-- morris js -->
    <script src="{{URL::asset('assets/vendor/charts/morris-bundle/raphael.min.js')}}"></script>
    <script src="{{URL::asset('assets/vendor/charts/morris-bundle/morris.js')}}"></script>
    <!-- chart c3 js -->
    <script src="{{URL::asset('assets/vendor/charts/c3charts/c3.min.js')}}"></script>
    <script src="{{URL::asset('assets/vendor/charts/c3charts/d3-5.4.0.min.js')}}"></script>
    <script src="{{URL::asset('assets/vendor/charts/c3charts/C3chartjs.js')}}"></script>
    <script src="{{URL::asset('assets/libs/js/dashboard-ecommerce.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script> --}}
    {{-- <script>
        var url = "{{url('/chart')}}";
    var Pendapatan = new Array();
    var Labels = new Array();
    var Bulan = new Array();
    $(document).ready(function(){
    $.get(url, function(response){
    response.forEach(function(data){
    Pendapatan.push(data.pendapatan);
    Labels.push(data.pendapatan);
    Bulan.push(data.bulan);
    });
    var ctx = document.getElementById("canvas").getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
    labels:Bulan,
    datasets: [{
    label: 'Pendapatan',
    data: Pendapatan,
    borderWidth: 1
    }]
    },
    options: {
    scales: {
    yAxes: [{
    ticks: {
    beginAtZero:true
    }
    }]
    }
    }
    });
    });
    });
    </script> --}}
</body>

</html>