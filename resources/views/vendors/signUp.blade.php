<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
  <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
  <meta name="author" content="PIXINVENT">
  <title>signUp
  </title>
  <link rel="apple-touch-icon" href="{{url('public/admin/theme/app-assets/images/ico/apple-icon-120.png')}}">
  <link rel="shortcut icon" type="image/x-icon" href="{{url('public/admin/theme/app-assets/images/ico/favicon.ico')}}">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{url('public/admin/theme/app-assets/css/vendors.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('public/admin/theme/app-assets/vendors/css/forms/icheck/icheck.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('public/admin/theme/app-assets/vendors/css/forms/icheck/custom.css')}}">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="{{url('public/admin/theme/app-assets/css/app.css')}}">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{url('public/admin/theme/app-assets/css/core/menu/menu-types/vertical-menu-modern.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('public/admin/theme/app-assets/css/core/colors/palette-gradient.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('public/admin/theme/app-assets/css/pages/login-register.css')}}">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{url('public/admin/theme/assets/css/style.css')}}">
  <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu-modern 1-column   menu-expanded blank-page blank-page"
data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0">
                  <div class="card-title text-center">
                    <div class="p-1">
                      <img src="{{url('public/admin/theme/app-assets/images/logo/logo-dark.png')}}" alt="branding logo">
                    </div>
                  </div>
                  <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                    <span>vendor</span>
                  </h6>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <form class="form-horizontal form-simple" action="" method="post">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                      <fieldset class="form-group position-relative has-icon-left mb-0" style="margin-bottom: 1.5rem !important">
                        <input type="text" class="form-control form-control-lg input-lg" id="user-name" placeholder="Your Username"
                        name="username" value="{{ old('username') }}" autocomplete="off">
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                        @error('username')
                            <span style="color: red;">{{$message}}</span>
                        @enderror
                      </fieldset>

                      <fieldset class="form-group position-relative has-icon-left mb-0" style="margin-bottom: 1.5rem !important">
                        <input type="email" class="form-control form-control-lg input-lg" id="user-name" placeholder="Your Email"
                        name="email" value="{{ old('email') }}" autocomplete="off">
                        <div class="form-control-position">
                          <i class="ft-mail"></i>
                        </div>
                        @error('email')
                            <span style="color: red;">{{$message}}</span>
                        @enderror
                      </fieldset>

                      <fieldset class="form-group position-relative has-icon-left mb-0" style="margin-bottom: 1.5rem !important">
                        <input type="text" class="form-control form-control-lg input-lg" id="user-name" placeholder="phone"
                        name="phone"  value="{{ old('phone') }}" autocomplete="off">
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                        @error('phone')
                            <span style="color: red;">{{$message}}</span>
                        @enderror
                      </fieldset>

                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="password" class="form-control form-control-lg input-lg" id="user-password"
                        placeholder="Enter Password" name="password" value="{{ old('password') }}" autocomplete="off">
                        <div class="form-control-position">
                          <i class="la la-key"></i>
                        </div>
                        @error('password')
                            <span style="color: red;">{{$message}}</span>
                        @enderror
                      </fieldset>

                      @isset($adminLoginError)
                        <div class="alert alert-danger alert-dismissible mb-2" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <div>passwored or username is wrong</div>
                        </div>
                      @endisset

                      <div class="form-group row">
                        <div class="col-md-6 col-12 text-center text-md-right"><a href="{{url('vendors/login')}}" class="card-link">login</a></div>
                      </div>
                      <button type="submit" class="btn btn-info btn-lg btn-block"><i class="ft-unlock"></i>Save</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <!-- BEGIN VENDOR JS-->
  <script src="{{url('public/admin/theme/app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="{{url('public/admin/theme/app-assets/vendors/js/forms/icheck/icheck.min.js')}}" type="text/javascript"></script>
  <script src="{{url('public/admin/theme/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"
  type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="{{url('public/admin/theme/app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
  <script src="{{url('public/admin/theme/app-assets/js/core/app.js')}}" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="{{url('public/admin/theme/app-assets/js/scripts/forms/form-login-register.js')}}" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
</body>
</html>