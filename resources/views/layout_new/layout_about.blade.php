<!--

=========================================================
* Argon Dashboard - v1.1.2
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2020 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>
    Tentang Kami
  </title>
  <!-- Favicon -->
  <link href="{{URL::asset('assets/img/brand/favicon.png')}}" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{URL::asset('assets/js/plugins/nucleo/css/nucleo.css')}}" rel="stylesheet" />
  <link href="{{URL::asset('assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{URL::asset('assets/css/argon-dashboard.css?v=1.1.2')}}" rel="stylesheet" />
  
</head>

<body class="">
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="/">
        <img src="{{asset('assets/img/cellphone.png')}}" class="navbar-brand-img" alt="..."> <b>SIG Jalan Rusak</b>
      </a>
      <!-- User -->
      
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="/">
                <img src="{{asset('assets/img/cellphone.png')}}" class="navbar-brand-img" alt="...">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        {{-- <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form> --}}
        <!-- Navigation -->
        @if(!Auth::user())
            @include('layout_new/sidebar_user')
        @else
            @if(Auth::user()->user_role == "admin")
                @include('layout_new/sidebar_admin')
            @else
                @include('layout_new/sidebar_user')
            @endif
        @endif
        <!-- Divider -->
        <hr class="my-3">
        <ul class="navbar-nav">
          <li class="nav-item  active ">
            <a class="nav-link " href="/about">
              <i class="fa fa-heart text-red"></i> Tentang Kami
            </a>
          </li>
        </ul>
        <!-- Heading -->
      </div>
    </div>
  </nav>
  @yield('content')
  <!--   Core   -->
  <script src="{{URL::asset('assets/js/plugins/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <!--   Optional JS   -->

 
  <!--   Argon JS   -->
  <script src="{{URL::asset('assets/js/argon-dashboard.min.js?v=1.1.2')}}"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC4Kci4iYfmBJ0_DOJDE-UOEOyHVi6pv4&libraries=places&callback=initMap" async
  defer></script>
  @yield('javascript')
</body>

</html>