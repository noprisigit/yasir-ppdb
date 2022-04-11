<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta charset="utf-8" />
  <title>404 Error Page - Ace Admin</title>

  <meta name="description" content="404 Error Page" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

  <!-- bootstrap & fontawesome -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

  <!-- page specific plugin styles -->

  <!-- text fonts -->
  <link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

  <!-- ace styles -->
  <link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

  <!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
  <link rel="stylesheet" href="assets/css/ace-skins.min.css" />
  <link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

  <!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

  <!-- inline styles related to this page -->

  <!-- ace settings handler -->
  <script src="assets/js/ace-extra.min.js"></script>

  <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

  <!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body class="no-skin">
  
  <div class="main-container ace-save-state" id="main-container">
    
    

    <div class="main-content">
      <div class="main-content-inner">

        <div class="page-content">

          <div class="row">
            <div class="col-xs-12">
              <!-- PAGE CONTENT BEGINS -->

              <div class="error-container">
                <div class="well">
                  <h1 class="grey lighter smaller">
                    <span class="blue bigger-125">
                      <i class="ace-icon fa fa-sitemap"></i>
                      404
                    </span>
                    Page Not Found
                  </h1>

                  <hr />
                  <h3 class="lighter smaller">We looked everywhere but we couldn't find it!</h3>

                  <div>

                    <div class="space"></div>
                    <h4 class="smaller">Try one of the following:</h4>

                    <ul class="list-unstyled spaced inline bigger-110 margin-15">
                      <li>
                        <i class="ace-icon fa fa-hand-o-right blue"></i>
                        Re-check the url for typos
                      </li>

                      <li>
                        <i class="ace-icon fa fa-hand-o-right blue"></i>
                        Read the faq
                      </li>

                      <li>
                        <i class="ace-icon fa fa-hand-o-right blue"></i>
                        Tell us about it
                      </li>
                    </ul>
                  </div>

                  <hr />
                  <div class="space"></div>

                  <div class="center">
                    <a href="javascript:history.back()" class="btn btn-grey">
                      <i class="ace-icon fa fa-arrow-left"></i>
                      Go Back
                    </a>

                    <a href="<?= base_url() ?>" class="btn btn-primary">
                      <i class="ace-icon fa fa-tachometer"></i>
                      Home
                    </a>
                  </div>
                </div>
              </div>

              <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.page-content -->
      </div>
    </div><!-- /.main-content -->

    <div class="footer">
      <div class="footer-inner">
        <div class="footer-content">
          <span class="bigger-120">
            <span class="blue bolder">Ace</span>
            Application &copy; 2013-2014
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
  <script src="assets/js/jquery-2.1.4.min.js"></script>

  <!-- <![endif]-->

  <!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
  <script type="text/javascript">
    if ('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
  </script>
  <script src="assets/js/bootstrap.min.js"></script>

  <!-- page specific plugin scripts -->

  <!-- ace scripts -->
  <script src="assets/js/ace-elements.min.js"></script>
  <script src="assets/js/ace.min.js"></script>

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
    <div><img src="//mc.yandex.ru/watch/25836836" style="position:absolute; left:-9999px;" alt="" /></div>
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
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-38894584-2', 'auto');
    ga('send', 'pageview');
  </script>
</body>

</html>