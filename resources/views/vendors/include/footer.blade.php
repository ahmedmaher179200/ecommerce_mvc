<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2018 <a class="text-bold-800 grey darken-2" href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent"
        target="_blank">PIXINVENT </a>, All rights reserved. </span>
      <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span>
    </p>
  </footer>
  <!-- BEGIN VENDOR JS-->
  <script src="{{url('public/admin/theme/app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="{{url('public/admin/theme/app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
  <script src="{{url('public/admin/theme/app-assets/js/core/app.js')}}" type="text/javascript"></script>
  <script src="{{url('public/admin/theme/app-assets/js/scripts/customizer.js')}}" type="text/javascript"></script>

  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('04b6525a4ec588084c5a', {
      cluster: 'eu'
    });

    var channel = pusher.subscribe('preder-notification-{{auth('vendor')->user()->id}}');
    channel.bind('preder-notification', function(data) {
      $('.newNotificationsNumber').html(data['count']);
      $(".media-list").prepend(data['notification_html']);
    });
  </script>

  @include('vendors.include.ajax')

  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="{{url('public/admin/theme/app-assets/js/scripts/navs/navs.js')}}" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
</body>
</html>