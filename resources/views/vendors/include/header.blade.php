<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
  <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
  <meta name="author" content="PIXINVENT">
  <title>@yield('title', 'vendor')</title>
  <link rel="apple-touch-icon" href="{{url('public/admin/theme/app-assets/images/ico/apple-icon-120.png')}}">
  <link rel="shortcut icon" type="image/x-icon" href="{{url('public/admin/theme/app-assets/images/ico/favicon.ico')}}">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{url('public/admin/theme/app-assets/css/vendors.css')}}">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="{{url('public/admin/theme/app-assets/css/app.css')}}">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{url('public/admin/theme/app-assets/css/core/menu/menu-types/vertical-menu-modern.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('public/admin/theme/app-assets/css/core/colors/palette-gradient.css')}}">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{url('public/admin/theme/assets/css/style.css')}}">
  <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
  <div class="navbar-wrapper">
    <div class="navbar-header">
      <ul class="nav navbar-nav flex-row">
        <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
        <li class="nav-item mr-auto">
          <a class="navbar-brand" href="{{url('vendors')}}">
            <img class="brand-logo" alt="modern admin logo" src="{{url('public/admin/theme/app-assets/images/logo/logo.png')}}">
            <h3 class="brand-text">Modern Admin</h3>
          </a>
        </li>
        <li class="nav-item d-none d-md-block float-right"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="toggle-icon ft-toggle-right font-medium-3 white" data-ticon="ft-toggle-right"></i></a></li>
        <li class="nav-item d-md-none">
          <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
        </li>
      </ul>
    </div>
    <div class="navbar-container content">
      <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="nav navbar-nav mr-auto float-left">
          <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
          <li class="dropdown nav-item mega-dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Mega</a>
            <ul class="mega-dropdown-menu dropdown-menu row">
              <li class="col-md-2">
                <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="la la-newspaper-o"></i> News</h6>
                <div id="mega-menu-carousel-example">
                  <div>
                    <img class="rounded img-fluid mb-1" src="{{url('public/admin/theme/app-assets/images/slider/slider-2.png')}}"
                    alt="First slide"><a class="news-title mb-0" href="#">Poster Frame PSD</a>
                    <p class="news-content">
                      <span class="font-small-2">January 26, 2018</span>
                    </p>
                  </div>
                </div>
              </li>
              <li class="col-md-3">
                <h6 class="dropdown-menu-header text-uppercase"><i class="la la-random"></i> Drill down menu</h6>
                <ul class="drilldown-menu">
                  <li class="menu-list">
                    <ul>
                      <li>
                        <a class="dropdown-item" href="layout-2-columns.html"><i class="ft-file"></i> Page layouts & Templates</a>
                      </li>
                      <li><a href="#"><i class="ft-align-left"></i> Multi level menu</a>
                        <ul>
                          <li><a class="dropdown-item" href="#"><i class="la la-bookmark-o"></i>  Second level</a></li>
                          <li><a href="#"><i class="la la-lemon-o"></i> Second level menu</a>
                            <ul>
                              <li><a class="dropdown-item" href="#"><i class="la la-heart-o"></i>  Third level</a></li>
                              <li><a class="dropdown-item" href="#"><i class="la la-file-o"></i> Third level</a></li>
                              <li><a class="dropdown-item" href="#"><i class="la la-trash-o"></i> Third level</a></li>
                              <li><a class="dropdown-item" href="#"><i class="la la-clock-o"></i> Third level</a></li>
                            </ul>
                          </li>
                          <li><a class="dropdown-item" href="#"><i class="la la-hdd-o"></i> Second level, third link</a></li>
                          <li><a class="dropdown-item" href="#"><i class="la la-floppy-o"></i> Second level, fourth link</a></li>
                        </ul>
                      </li>
                      <li>
                        <a class="dropdown-item" href="color-palette-primary.html"><i class="ft-camera"></i> Color palette system</a>
                      </li>
                      <li><a class="dropdown-item" href="sk-2-columns.html"><i class="ft-edit"></i> Page starter kit</a></li>
                      <li><a class="dropdown-item" href="changelog.html"><i class="ft-minimize-2"></i> Change log</a></li>
                      <li>
                        <a class="dropdown-item" href="https://pixinvent.ticksy.com/"><i class="la la-life-ring"></i> Customer support center</a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="col-md-3">
                <h6 class="dropdown-menu-header text-uppercase"><i class="la la-list-ul"></i> Accordion</h6>
                <div id="accordionWrap" role="tablist" aria-multiselectable="true">
                  <div class="card border-0 box-shadow-0 collapse-icon accordion-icon-rotate">
                    <div class="card-header p-0 pb-2 border-0" id="headingOne" role="tab"><a data-toggle="collapse" data-parent="#accordionWrap" href="#accordionOne"
                      aria-expanded="true" aria-controls="accordionOne">Accordion Item #1</a></div>
                    <div class="card-collapse collapse show" id="accordionOne" role="tabpanel" aria-labelledby="headingOne"
                    aria-expanded="true">
                      <div class="card-content">
                        <p class="accordion-text text-small-3">Caramels dessert chocolate cake pastry jujubes bonbon.
                          Jelly wafer jelly beans. Caramels chocolate cake liquorice
                          cake wafer jelly beans croissant apple pie.</p>
                      </div>
                    </div>
                    <div class="card-header p-0 pb-2 border-0" id="headingTwo" role="tab"><a class="collapsed" data-toggle="collapse" data-parent="#accordionWrap"
                      href="#accordionTwo" aria-expanded="false" aria-controls="accordionTwo">Accordion Item #2</a></div>
                    <div class="card-collapse collapse" id="accordionTwo" role="tabpanel" aria-labelledby="headingTwo"
                    aria-expanded="false">
                      <div class="card-content">
                        <p class="accordion-text">Sugar plum bear claw oat cake chocolate jelly tiramisu
                          dessert pie. Tiramisu macaroon muffin jelly marshmallow
                          cake. Pastry oat cake chupa chups.</p>
                      </div>
                    </div>
                    <div class="card-header p-0 pb-2 border-0" id="headingThree" role="tab"><a class="collapsed" data-toggle="collapse" data-parent="#accordionWrap"
                      href="#accordionThree" aria-expanded="false" aria-controls="accordionThree">Accordion Item #3</a></div>
                    <div class="card-collapse collapse" id="accordionThree" role="tabpanel" aria-labelledby="headingThree"
                    aria-expanded="false">
                      <div class="card-content">
                        <p class="accordion-text">Candy cupcake sugar plum oat cake wafer marzipan jujubes
                          lollipop macaroon. Cake dragée jujubes donut chocolate
                          bar chocolate cake cupcake chocolate topping.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="col-md-4">
                <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="la la-envelope-o"></i> Contact Us</h6>
                <form class="form form-horizontal">
                  <div class="form-body">
                    <div class="form-group row">
                      <label class="col-sm-3 form-control-label" for="inputName1">Name</label>
                      <div class="col-sm-9">
                        <div class="position-relative has-icon-left">
                          <input class="form-control" type="text" id="inputName1" placeholder="John Doe">
                          <div class="form-control-position pl-1"><i class="la la-user"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 form-control-label" for="inputEmail1">Email</label>
                      <div class="col-sm-9">
                        <div class="position-relative has-icon-left">
                          <input class="form-control" type="email" id="inputEmail1" placeholder="john@example.com">
                          <div class="form-control-position pl-1"><i class="la la-envelope-o"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 form-control-label" for="inputMessage1">Message</label>
                      <div class="col-sm-9">
                        <div class="position-relative has-icon-left">
                          <textarea class="form-control" id="inputMessage1" rows="2" placeholder="Simple Textarea"></textarea>
                          <div class="form-control-position pl-1"><i class="la la-commenting-o"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12 mb-1">
                        <button class="btn btn-info float-right" type="button"><i class="la la-paper-plane-o"></i> Send </button>
                      </div>
                    </div>
                  </div>
                </form>
              </li>
            </ul>
          </li>
          <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="ficon ft-search"></i></a>
            <div class="search-input">
              <input class="input" type="text" placeholder="Explore Modern...">
            </div>
          </li>
        </ul>
        <ul class="nav navbar-nav float-right">
          <li class="dropdown dropdown-user nav-item">
            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
              <span class="mr-1">Hello,
                <span class="user-name text-bold-700">{{auth('vendor')->user()->name}}</span>
              </span>
              <span class="avatar avatar-online">
                <img src="{{url('public/uploads/vendors/' . auth('vendor')->user()->getImage())}} " alt="avatar" style="width: 45px !important;height: 36px !important;"><i></i></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="{{url('vendors/profile/edite/' . auth('vendor')->user()->id )}}"><i class="ft-user"></i>Edit Profile</a>
              <div class="dropdown-divider"></div><a class="dropdown-item" href="{{url('vendors/logout')}}"><i class="ft-power"></i> Logout</a>
            </div>
          </li>
          <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-gb"></i><span class="selected-language"></span></a>
            <div class="dropdown-menu" aria-labelledby="dropdown-flag">
              @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                  <a rel="alternate" class="dropdown-item" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                    <i class="flag-icon flag-icon-fr"></i>{{ $properties['native'] }}
                  </a>
              @endforeach
            </div>
          </li>
          <?php 
              $new_notifications = App\Models\Vendor_notification::where('vendor_id', auth('vendor')->user()->id)
                                                                ->where('seen', 0)
                                                                ->get();
            ?>
          <li class="dropdown dropdown-notification nav-item">
            <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell newNotificationsNumber"></i>
              <span class="badge badge-pill newNotificationsNumber newNotificationsNumberEdit badge-default badge-danger badge-default badge-up badge-glow">{{count($new_notifications)}}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
              <li class="dropdown-menu-header">
                <h6 class="dropdown-header m-0">
                  <span class="grey darken-2">Notifications</span>
                </h6>
                
                <span class="notification-tag badge NotificationsNumber badge-default badge-danger float-right m-0">{{count($new_notifications)}} New</span>
              </li>
              <li class="scrollable-container media-list notificationsList w-100">
                      <a href="{{url('vendors/notification')}}">
                        <?php 
                          $all_notifications = App\Models\Vendor_notification::where('vendor_id', auth('vendor')->user()->id)->get();
                        ?>
                        @foreach ($all_notifications as $notification)
                          <div class="media">
                            <div class="media-left align-self-center"><i class="ft-plus-square icon-bg-circle bg-cyan"></i></div>
                            <div class="media-body">
                              <h6 class="media-heading">{{$notification->title}}</h6>
                              <p class="notification-text font-small-3 text-muted">{{$notification->content}}</p>
                              <small>
                                <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">{{$notification->created_at}}</time>
                              </small>
                            </div>
                          </div>
                        @endforeach
                      </a>
                {{-- <div class="noNotifications">there are no notifications</div> --}}
              <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="#">Read all notifications</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
