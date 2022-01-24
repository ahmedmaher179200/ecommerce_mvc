<?php 
    $page = "dashbourd";
?>
@extends('layouts.vendors')

@section('content')
    @include('vendors.alerts.success')
    @include('vendors.alerts.error')

    <link rel="stylesheet" type="text/css" href="{{url('public/admin/theme/app-assets/vendors/css/weather-icons/climacons.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('public/admin/theme/app-assets/fonts/meteocons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('public/admin/theme/app-assets/vendors/css/charts/chartist.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('public/admin/theme/app-assets/vendors/css/charts/morris.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('public/admin/theme/app-assets/vendors/css/charts/chartist-plugin-tooltip.css')}}">

    <link rel="stylesheet" type="text/css" href="{{url('public/admin/theme/app-assets/fonts/simple-line-icons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('public/admin/theme/app-assets/css/pages/dashboard-ecommerce.css')}}">

    <div class="app-content content" style="margin-left: 0px;">
        <div class="content-wrapper">
          <div class="content-header row">
          </div>
          <div class="content-body">
            <!-- eCommerce statistic -->
            <div class="row">
              <div class="col-xl-3 col-lg-6 col-12">
                <div class="card pull-up">
                  <div class="card-content">
                    <div class="card-body">
                      <div class="media d-flex">
                        <div class="media-body text-left">
                          <h3 class="info">{{$all_order_count}}</h3>
                          <h6>all order</h6>
                        </div>
                        <div>
                          <i class="icon-basket-loaded info font-large-2 float-right"></i>
                        </div>
                      </div>
                      <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                        <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 80%"
                        aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6 col-12">
                <div class="card pull-up">
                  <div class="card-content">
                    <div class="card-body">
                      <div class="media d-flex">
                        <div class="media-body text-left">
                          
                          <h3 class="warning">{{$finshed_order_count}}</h3>
                          <h6>finshed order</h6>
                        </div>
                        <div>
                          <i class="icon-pie-chart warning font-large-2 float-right"></i>
                        </div>
                      </div>
                      <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                        <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 65%"
                        aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6 col-12">
                <div class="card pull-up">
                  <div class="card-content">
                    <div class="card-body">
                      <div class="media d-flex">
                        <div class="media-body text-left">
                          
                          <h3 class="success">${{$total_money}}</h3>
                          <h6>total money</h6>
                        </div>
                        <div>
                          <i class="icon-user-follow success font-large-2 float-right"></i>
                        </div>
                      </div>
                      <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                        <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 75%"
                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6 col-12">
                <div class="card pull-up">
                  <div class="card-content">
                    <div class="card-body">
                      <div class="media d-flex">
                        <div class="media-body text-left">
                          <h3 class="danger">50$</h3>
                          <h6>received money</h6>
                        </div>
                        <div>
                          <i class="icon-heart danger font-large-2 float-right"></i>
                        </div>
                      </div>
                      <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                        <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 85%"
                        aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            {{-- <div class="row match-height">
              <div class="col-xl-12 col-12" id="ecommerceChartView">
                <div class="card card-shadow">
                  <div class="card-header card-header-transparent py-20">
                    <div class="btn-group dropdown">
                      <a href="#" class="text-body dropdown-toggle blue-grey-700" data-toggle="dropdown">PRODUCTS SALES</a>
                      <div class="dropdown-menu animate" role="menu">
                        <a class="dropdown-item" href="#" role="menuitem">Sales</a>
                        <a class="dropdown-item" href="#" role="menuitem">Total sales</a>
                        <a class="dropdown-item" href="#" role="menuitem">profit</a>
                      </div>
                    </div>
                    <ul class="nav nav-pills nav-pills-rounded chart-action float-right btn-group" role="group">
                      <li class="nav-item"><a class="active nav-link" data-toggle="tab" href="#scoreLineToDay">Day</a></li>
                      <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#scoreLineToWeek">Week</a></li>
                      <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#scoreLineToMonth">Month</a></li>
                    </ul>
                  </div>
                  <div class="widget-content tab-content bg-white p-20">
                    <div class="ct-chart tab-pane active scoreLineShadow" id="scoreLineToDay"></div>
                    <div class="ct-chart tab-pane scoreLineShadow" id="scoreLineToWeek"></div>
                    <div class="ct-chart tab-pane scoreLineShadow" id="scoreLineToMonth"></div>
                  </div>
                </div>
              </div>
            </div> --}}
            
            {{-- <div class="row match-height">
              <div class="col-xl-8 col-lg-12">
                <div class="card">
                  <div class="card-content ">
                    <div id="cost-revenue" class="height-250 position-relative"></div>
                  </div>
                  <div class="card-footer">
                    <div class="row mt-1">
                      <div class="col-3 text-center">
                        <h6 class="text-muted">Total Products</h6>
                        <h2 class="block font-weight-normal">18.6 k</h2>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                          <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 70%"
                          aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                      <div class="col-3 text-center">
                        <h6 class="text-muted">Total Sales</h6>
                        <h2 class="block font-weight-normal">64.54 M</h2>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                          <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 60%"
                          aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                      <div class="col-3 text-center">
                        <h6 class="text-muted">Total Cost</h6>
                        <h2 class="block font-weight-normal">24.38 B</h2>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                          <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 40%"
                          aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                      <div class="col-3 text-center">
                        <h6 class="text-muted">Total Revenue</h6>
                        <h2 class="block font-weight-normal">36.72 M</h2>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                          <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 90%"
                          aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-12">
                <div class="card">
                  <div class="card-content">
                    <div class="card-body sales-growth-chart">
                      <div id="monthly-sales" class="height-250"></div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="chart-title mb-1 text-center">
                      <h6>Total monthly Sales.</h6>
                    </div>
                    <div class="chart-stats text-center">
                      <a href="#" class="btn btn-sm btn-danger box-shadow-2 mr-1">Statistics <i class="ft-bar-chart"></i></a>
                      <span class="text-muted">for the last year.</span>
                    </div>
                  </div>
                </div>
              </div>
            </div> --}}


          </div>
        </div>
      </div>
      <script src="{{url('public/admin/theme/app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
      
      <script src="{{url('public/admin/theme/app-assets/vendors/js/charts/chartist.min.js')}}" type="text/javascript"></script>
      <script src="{{url('public/admin/theme/app-assets/vendors/js/charts/chartist-plugin-tooltip.min.js')}}" type="text/javascript"></script>
      <script src="{{url('public/admin/theme/app-assets/vendors/js/charts/raphael-min.js')}}" type="text/javascript"></script>
      <script src="{{url('public/admin/theme/app-assets/vendors/js/charts/morris.min.js')}}" type="text/javascript"></script>

      <script src="{{url('public/admin/theme/app-assets/vendors/js/timeline/horizontal-timeline.js')}}" type="text/javascript"></script>
      <script src="{{url('public/admin/theme/app-assets/js/scripts/pages/dashboard-ecommerce.js')}}" type="text/javascript"></script>

      <script src="{{url('public/admin/theme/app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>

@stop