@extends('layout_new.layout_about')

@section('content')
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index.html">About the Team</a>
        <!-- Form -->
      </div>
    </nav>
    <!-- End Navbar -->
    <!-- Header -->
<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 400px; background-image: {{asset('images/profil/cover.jpg')}}; background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello Friends</h1>
            <p class="text-white mt-0 mb-5">These are line up of team. You can see the progress we've made with our work about Geographic Information System of Broken Road in Bali. </p>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <!-- Page content -->
    <div class="container-fluid mt--7 mb-4">
        <div class="row">
          <div class="col-xl-4 order-xl-1 mb-7">
            <div class="card bg-secondary shadow">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                      <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                          <a href="#">
                            <img src="{{asset('images/profil/putri1x1.jpg')}}" class="rounded-circle">
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                      <div class="d-flex justify-content-between">
                        
                      </div>
                    </div>
                    <div class="card-body pt-0 pt-md-4">
                      <div class="row">
                        <div class="col">
                          <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                          </div>
                        </div>
                      </div>
                      <div class="text-center">
                        <h3>
                            Putri Chintyadewi
                            </h3>
                            <div class="h5 font-weight-300">
                              <i class="ni location_pin mr-2"></i>1705551023
                            </div>
                            <div class="h5 mt-4">
                              <i class="ni business_briefcase-24 mr-2"></i>Information Technology
                            </div>
                            <div>
                              <i class="ni education_hat mr-2"></i>University of Udayana
                            </div>
                            <hr class="my-4" />
                      </div>
                    </div>
                  </div>
            </div>
          </div>
          <div class="col-xl-4 order-xl-1 mb-7">
             <div class="card bg-secondary shadow">
            <div class="card card-profile shadow">
                <div class="row justify-content-center">
                  <div class="col-lg-3 order-lg-2">
                    <div class="card-profile-image">
                      <a href="#">
                        <img src="{{asset('images/profil/jack1x1.jpg')}}" class="rounded-circle">
                      </a>
                    </div>
                  </div>
                </div>
                <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                  <div class="d-flex justify-content-between">
                    
                  </div>
                </div>
                <div class="card-body pt-0 pt-md-4">
                  <div class="row">
                    <div class="col">
                      <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                      </div>
                    </div>
                  </div>
                  <div class="text-center">
                    <h3>
                      Juliarta Arya
                    </h3>
                    <div class="h5 font-weight-300">
                      <i class="ni location_pin mr-2"></i>1705551031
                    </div>
                    <div class="h5 mt-4">
                      <i class="ni business_briefcase-24 mr-2"></i>Information Technology
                    </div>
                    <div>
                      <i class="ni education_hat mr-2"></i>University of Udayana
                    </div>
                    <hr class="my-4" />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 order-xl-1 mb-7">
            <div class="card bg-secondary shadow">
              <div class="card card-profile shadow">
                  <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                      <div class="card-profile-image">
                        <a href="#">
                          <img src="{{asset('images/profil/widi1x1.jpg')}}" class="rounded-circle">
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                    <div class="d-flex justify-content-between">
                     
                    </div>
                  </div>
                  <div class="card-body pt-0 pt-md-4">
                    <div class="row">
                      <div class="col">
                        <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                        </div>
                      </div>
                    </div>
                    <div class="text-center">
                        <h3>
                            Widiana Putra
                          </h3>
                          <div class="h5 font-weight-300">
                            <i class="ni location_pin mr-2"></i>1705551034
                          </div>
                          <div class="h5 mt-4">
                            <i class="ni business_briefcase-24 mr-2"></i>Information Technology
                          </div>
                          <div>
                            <i class="ni education_hat mr-2"></i>University of Udayana
                          </div>
                          <hr class="my-4" />
                      </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
              <div class="col-xl-4 order-xl-1 mb-7">
                <div class="card bg-secondary shadow">
                    <div class="card card-profile shadow">
                        <div class="row justify-content-center">
                          <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                              <a href="#">
                                <img src="{{asset('images/profil/angga1x1.jpg')}}" class="rounded-circle">
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                          <div class="d-flex justify-content-between">
                            
                          </div>
                        </div>
                        <div class="card-body pt-0 pt-md-4">
                          <div class="row">
                            <div class="col">
                              <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                              </div>
                            </div>
                          </div>
                          <div class="text-center">
                            <h3>
                            Angga Kusuma
                            </h3>
                            <div class="h5 font-weight-300">
                              <i class="ni location_pin mr-2"></i>1705551051
                            </div>
                            <div class="h5 mt-4">
                              <i class="ni business_briefcase-24 mr-2"></i>Information Technology
                            </div>
                            <div>
                              <i class="ni education_hat mr-2"></i>University of Udayana
                            </div>
                            <hr class="my-4" />
                          </div>
                        </div>
                      </div>
                </div>
              </div>
              <div class="col-xl-4 order-xl-1 mb-7">
              <div class="card bg-secondary shadow">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                      <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                          <a href="#">
                            <img src="{{asset('images/profil/nila1x1.jpg')}}" class="rounded-circle">
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                      <div class="d-flex justify-content-between">
                       
                      </div>
                    </div>
                    <div class="card-body pt-0 pt-md-4">
                      <div class="row">
                        <div class="col">
                          <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                          </div>
                        </div>
                      </div>
                      <div class="text-center">
                        <h3>
                            Nila Arta
                            </h3>
                            <div class="h5 font-weight-300">
                              <i class="ni location_pin mr-2"></i>1705551059
                            </div>
                            <div class="h5 mt-4">
                              <i class="ni business_briefcase-24 mr-2"></i>Information Technology
                            </div>
                            <div>
                              <i class="ni education_hat mr-2"></i>University of Udayana
                            </div>
                            <hr class="my-4" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 order-xl-1 mb-7">
                <div class="card bg-secondary shadow">
                  <div class="card card-profile shadow">
                      <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                          <div class="card-profile-image">
                            <a href="#">
                              <img src="{{asset('images/profil/adim1x1.jpg')}}" class="rounded-circle">
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                         
                        </div>
                      </div>
                      <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                          <div class="col">
                            <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                            </div>
                          </div>
                        </div>
                        <div class="text-center">
                            <h3>
                                Adi Merta Pratama
                                </h3>
                                <div class="h5 font-weight-300">
                                  <i class="ni location_pin mr-2"></i>1705551072
                                </div>
                                <div class="h5 mt-4">
                                  <i class="ni business_briefcase-24 mr-2"></i>Information Technology
                                </div>
                                <div>
                                  <i class="ni education_hat mr-2"></i>University of Udayana
                                </div>
                                <hr class="my-4" />
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
            </div>
      
    </div>
  </div>
@endsection 