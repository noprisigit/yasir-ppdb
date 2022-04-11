<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from ace.jeka.by/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Aug 2021 03:08:53 GMT -->

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta charset="utf-8" />
  <title><?= $mainTitle ?> <?= isset($secTitle) ? " | " . $secTitle : "" ?> - PSB Yasir Islamic School</title>

  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

  <!-- bootstrap & fontawesome -->
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/font-awesome/4.5.0/css/font-awesome.min.css') ?>" />

  <!-- page specific plugin styles -->

  <!-- text fonts -->
  <link rel="stylesheet" href="<?= base_url('assets/css/fonts.googleapis.com.css') ?>" />

  <!-- ace styles -->
  <link rel="stylesheet" href="<?= base_url('assets/css/ace.min.css') ?>" class="ace-main-stylesheet" id="main-ace-style" />

  <!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
  <link rel="stylesheet" href="<?= base_url('assets/css/ace-skins.min.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/css/ace-rtl.min.css') ?>" />

  <!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

  <!-- inline styles related to this page -->

  <!-- ace settings handler -->
  <script src="<?= base_url('assets/js/ace-extra.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/jquery-2.1.4.min.js') ?>"></script>

  <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

  <!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body class="no-skin">
  <div id="navbar" class="navbar navbar-default bg-green ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
      <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
        <span class="sr-only">Toggle sidebar</span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>
      </button>

      <div class="navbar-header pull-left">
        <a href="index-2.html" class="navbar-brand">
          <small>
            <i class="fa fa-leaf"></i>
            PSB Yasir Islamic School
          </small>
        </a>
      </div>

      <div class="navbar-buttons navbar-header pull-right" role="navigation">
        <ul class="nav ace-nav">
          <?php if (session()->get('status') == "Administrator" || session()->get('status') == "Petugas PSB") : ?>
            <!-- <li class="green dropdown-modal">
              <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
                <span class="badge badge-success">5</span>
              </a>

              <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                <li class="dropdown-header">
                  <i class="ace-icon fa fa-envelope-o"></i>
                  5 Messages
                </li>

                <li class="dropdown-content">
                  <ul class="dropdown-menu dropdown-navbar">
                    <li>
                      <a href="#" class="clearfix">
                        <img src="assets/images/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
                        <span class="msg-body">
                          <span class="msg-title">
                            <span class="blue">Alex:</span>
                            Ciao sociis natoque penatibus et auctor ...
                          </span>

                          <span class="msg-time">
                            <i class="ace-icon fa fa-clock-o"></i>
                            <span>a moment ago</span>
                          </span>
                        </span>
                      </a>
                    </li>

                    <li>
                      <a href="#" class="clearfix">
                        <img src="assets/images/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
                        <span class="msg-body">
                          <span class="msg-title">
                            <span class="blue">Susan:</span>
                            Vestibulum id ligula porta felis euismod ...
                          </span>

                          <span class="msg-time">
                            <i class="ace-icon fa fa-clock-o"></i>
                            <span>20 minutes ago</span>
                          </span>
                        </span>
                      </a>
                    </li>

                    <li>
                      <a href="#" class="clearfix">
                        <img src="assets/images/avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
                        <span class="msg-body">
                          <span class="msg-title">
                            <span class="blue">Bob:</span>
                            Nullam quis risus eget urna mollis ornare ...
                          </span>

                          <span class="msg-time">
                            <i class="ace-icon fa fa-clock-o"></i>
                            <span>3:15 pm</span>
                          </span>
                        </span>
                      </a>
                    </li>

                    <li>
                      <a href="#" class="clearfix">
                        <img src="assets/images/avatars/avatar2.png" class="msg-photo" alt="Kate's Avatar" />
                        <span class="msg-body">
                          <span class="msg-title">
                            <span class="blue">Kate:</span>
                            Ciao sociis natoque eget urna mollis ornare ...
                          </span>

                          <span class="msg-time">
                            <i class="ace-icon fa fa-clock-o"></i>
                            <span>1:33 pm</span>
                          </span>
                        </span>
                      </a>
                    </li>

                    <li>
                      <a href="#" class="clearfix">
                        <img src="assets/images/avatars/avatar5.png" class="msg-photo" alt="Fred's Avatar" />
                        <span class="msg-body">
                          <span class="msg-title">
                            <span class="blue">Fred:</span>
                            Vestibulum id penatibus et auctor ...
                          </span>

                          <span class="msg-time">
                            <i class="ace-icon fa fa-clock-o"></i>
                            <span>10:09 am</span>
                          </span>
                        </span>
                      </a>
                    </li>
                  </ul>
                </li>

                <li class="dropdown-footer">
                  <a href="inbox.html">
                    See all messages
                    <i class="ace-icon fa fa-arrow-right"></i>
                  </a>
                </li>
              </ul>
            </li> -->
          <?php endif; ?>

          <li class="green dropdown-modal">
            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
              <img class="nav-user-photo" src="<?= $imageUrl ?>" alt="Jason's Photo" />
              <span class="user-info">
                <small>Welcome,</small>
                <?= session()->get('name') ?>
              </span>

              <i class="ace-icon fa fa-caret-down"></i>
            </a>

            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
              <li>
                <a href="<?= session()->get('status') == "Siswa" ? base_url('student/profile') : '' ?>">
                  <i class="ace-icon fa fa-user"></i>
                  Profile
                </a>
              </li>

              <li class="divider"></li>

              <li>
                <a href="<?= base_url('logout') ?>">
                  <i class="ace-icon fa fa-power-off"></i>
                  Logout
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div><!-- /.navbar-container -->
  </div>

  <div class="main-container ace-save-state" id="main-container">
    <script type="text/javascript">
      try {
        ace.settings.loadState('main-container')
      } catch (e) {}
    </script>

    <div id="sidebar" class="sidebar responsive ace-save-state">
      <script type="text/javascript">
        try {
          ace.settings.loadState('sidebar')
        } catch (e) {}
      </script>

      <ul class="nav nav-list">
        <?= $this->include('template/sidebar') ?>
      </ul><!-- /.nav-list -->

      <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
      </div>
    </div>

    <div class="main-content">
      <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
          <ul class="breadcrumb">
            <li>
              <i class="ace-icon fa fa-home home-icon"></i>
              <a href="<?= base_url() ?>">Home</a>
            </li>

            <?php if ($mainTitle <> "Home") : ?>
              <li>
                <a href="<?= isset($mainUrl) ? base_url($mainUrl) : "#" ?>"><?= $mainTitle ?></a>
              </li>
            <?php endif; ?>

            <?php if (isset($secTitle)) : ?>
              <li class="active"><?= $secTitle ?></li>
            <?php endif; ?>
          </ul><!-- /.breadcrumb -->

        </div>

        <div class="page-content">

          <div class="page-header">
            <h1>
              <?= $mainTitle ?>
              <?php if (isset($secTitle)) : ?>
                &mdash;
                <?= $secTitle ?>
              <?php endif; ?>
            </h1>
          </div>

          <?= view('template/content') ?>
        </div><!-- /.page-content -->
      </div>
    </div><!-- /.main-content -->

    <div class="footer">
      <div class="footer-inner">
        <div class="footer-content">
          <span class="bigger-120">
            <span class="blue bolder">Yasir Islamic School</span>
            &copy; 2021
          </span>
        </div>
      </div>
    </div>

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
      <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
  </div><!-- /.main-container -->

  <!-- basic scripts -->

  <!--[if !IE]> -->


  <!-- <![endif]-->

  <!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
  <script type="text/javascript">
    if ('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
  </script>
  <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>

  <!-- page specific plugin scripts -->
  <script src="<?= base_url('assets/js/bootbox.js') ?>"></script>
  <!-- ace scripts -->
  <script src="<?= base_url('assets/js/ace-elements.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/ace.min.js') ?>"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $(".message-alert").fadeTo(4000, 500).slideUp(500, function() {
        $(".message-alert").slideUp(500);
      });
    });
  </script>

  <!-- inline scripts related to this page -->
  <!-- Yandex.Metrika counter -->
  <script type="text/javascript">
    (function(d, w, c) {
      (w[c] = w[c] || []).push(function() {
        try {
          w.yaCounter25836836 = new Ya.Metrika({
            id: 25836836,
            webvisor: true,
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true
          });
        } catch (e) {}
      });

      var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function() {
          n.parentNode.insertBefore(s, n);
        };
      s.type = "text/javascript";
      s.async = true;
      s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

      if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
      } else {
        f();
      }
    })(document, window, "yandex_metrika_callbacks");
  </script>
  <noscript>
    <div><img src="http://mc.yandex.ru/watch/25836836" style="position:absolute; left:-9999px;" alt="" /></div>
  </noscript>
  <!-- /Yandex.Metrika counter -->
  <script>
    (function(i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date();
      a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
      m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '../www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-38894584-2', 'auto');
    ga('send', 'pageview');
  </script>
</body>

<!-- Mirrored from ace.jeka.by/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Aug 2021 03:08:53 GMT -->

</html>