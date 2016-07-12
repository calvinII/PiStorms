<?php
include "api/config.php";

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: ./login.php');
}

?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PiStorms Web Interface</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.3/css/AdminLTE.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.0.0/pnotify.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.3/css/skins/skin-red.min.css">
  <link rel="stylesheet" href="./slider.css">
  <style>
    .btn-sq {
      width: 50px !important;
      height: 50px !important;
      font-size: 24px;
    }
  </style>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <a href="../../index2.html" class="logo">
      <span class="logo-mini"><b>PS</b></span>
      <span class="logo-lg"><b>PiStorms</b> Web</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li>
            <a href="./logout.php">Logout&nbsp;&nbsp;<i class="fa fa-sign-out"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <?php
    include_once("./components/nav.php");
  ?>

  <div class="content-wrapper">
  
    <section class="content">
      <h2 class="page-header"><i class="fa fa-file-text-o"></i>&nbsp;&nbsp;PiStorms Logs</h2>
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">psmb.out</a></li>
              <li><a href="#tab_2" data-toggle="tab">psmd.out</a></li>
              <li><a href="#tab_3" data-toggle="tab">sws.out</a></li>
              <li><a href="#tab_4" data-toggle="tab">Apache error.log</a></li>
              <li><a href="javascript:window.scrollTo(0,document.body.scrollHeight);">Scroll to the Bottom</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <pre><?php
                    $data = 'empty';
                    $nf = false;
                    $file = fopen("/var/tmp/psmb.out", "r") or $nf = true;
                    if (!$nf) {
                        $data = fread($file,filesize("/var/tmp/psmb.out"));
                        fclose($file);
                    }
                    echo $data;
                ?></pre>
              </div>
              <div class="tab-pane" id="tab_2">
                <pre><?php
                    $data = 'empty';
                    $nf = false;
                    $file = fopen("/var/tmp/psmb.out", "r") or $nf = true;
                    if (!$nf) {
                        $data = fread($file,filesize("/var/tmp/psmd.out"));
                        fclose($file);
                    }
                    if (strlen($data) == 0) {
                        $data = "empty";
                    }
                    echo $data;
                ?></pre>
              </div>
              <div class="tab-pane" id="tab_3">
                <pre><?php
                    $data = 'empty';
                    $nf = false;
                    $file = fopen("/var/tmp/psmb.out", "r") or $nf = true;
                    if (!$nf) {
                        $data = fread($file,filesize("/var/tmp/sws.out"));
                        fclose($file);
                    }
                    if (strlen($data) == 0) {
                        $data = "empty";
                    }
                    echo $data;
                ?></pre>
              </div>
              <div class="tab-pane" id="tab_4">
                <h4>Only the last 25 lines are displayed</h4>
                <pre id="apacheerros"></pre>
              </div>
            </div>
          </div>
        </div>

      </div>
      


    </section>
  </div>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Software Version:</b> <?php echo $software_v; ?> / <b>Hardware Version:</b> <span class="firmware_version"><i class="fa fa-refresh fa-spin"></i> fetching</span>
    </div>
    <strong>PiStorms by <a href="http://mindsensors.com" target="_blank">mindsensors.com</a></strong>
  </footer>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.3/js/app.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.0.0/pnotify.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>

<script>
PNotify.prototype.options.styling = "bootstrap3";
PNotify.prototype.options.delay = 3000;

function notify(tt,tx,tp) {
    new PNotify({
        title: tt,
        text: tx,
        type: tp,
        icon: false
    });
}

var api = "http://<?=$_SERVER['SERVER_NAME']?>:3141/";

$.get(api+"firmware", function(data){
    $(".firmware_version").html(data);
});

$.get(api+"getapacheerrors", function(data){
    $("#apacheerros").html(data);
});

</script>

</body>
</html>