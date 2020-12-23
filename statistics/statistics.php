<?php
 session_start();
 include_once "../database/CRUD.php";
 $count = new CRUD();
 $number = $count->countHub();
 $number1 = $count->countEvent();
 $number2 = $count->countPartnership();
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
<!-- basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<!-- site metas -->
<title>Contact</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">
<!-- site icons -->
<link rel="icon" href="../images/fevicon/fevicon.png" type="image/gif" />
<!-- bootstrap css -->
<link rel="stylesheet" href="../css/bootstrap.min.css" />
<!-- Site css -->
<link rel="stylesheet" href="../css/style.css" />
<!-- responsive css -->
<link rel="stylesheet" href="../css/responsive.css" />
<!-- colors css -->
<link rel="stylesheet" href="../css/colors1_dark.css" />
<!-- custom css -->
<link rel="stylesheet" href="../css/custom.css" />
<!-- wow Animation css -->
<link rel="stylesheet" href="../css/animate.css" />
<!-- zoom effect -->
<link rel='stylesheet' href='../css/hizoom.css'>

</head>
<body id="default_theme" class="contact_us">
<!-- loader -->
<div class="bg_load"> <img class="loader_animation" src="../images/loaders/loader_1.png" alt="#" /> </div>
<!-- end loader -->
<!-- header -->
<header id="default_header" class="header_style_1">
  <!-- end header top -->
  <!-- header bottom -->
  <div class="header_bottom">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
          <!-- logo start -->
          <div class="logo"> <a href="it_home.html"><img src="../images/logos/logo.JPG" alt="logo" /></a> </div>
          <!-- logo end -->
        </div>
        <?php include "../Chairperson/statsNavbar.html" ?>
      </div>
    </div>
  </div>
  <!-- header bottom end -->
</header>
<!-- end header -->
<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="title-holder">
            <div class="title-holder-cell text-left">
              <h1 class="page-title"><?php echo "@".$_SESSION["Username"]; ?></h1>
              <ol class="breadcrumb">
                <li><a>Statistics</a></li>
                <li ><a href='../Chairperson/logout.php'class="active">Logout </a></li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end inner page banner -->
<div class="section padding_layout_1">
  <div class="container">
    <div class="row">
      <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12"></div>
      <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
        <div class="row">
          <div class="full">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 adress_cont margin_bottom_30">
              <div class="information_bottom left-side margin_bottom_20_all">
                <div class="full_text_align_center">
                <div class="icon_bottom"> <i class="fa fa-building" aria-hidden="true"></i> </div>
                  <h4 style="color: white;">Member Hubs</h4>
                  <h3 style="color: blue;"><?php echo $number; ?></h3>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 adress_cont margin_bottom_30">
              <div class="information_bottom left-side margin_bottom_20_all">
                <div class="full_text_align_center">
                <div class="icon_bottom"> <i class="fa fa-calendar" aria-hidden="true"></i> </div>
                  <h4 style="color: white;">Upcoming events</h4>
                  <h3 style="color: blue;"><?php echo $number1; ?></h3>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 adress_cont margin_bottom_30">
              <div class="information_bottom left-side">
                
                <div class="full_text_align_center">
                <div class="icon_bottom"> <i class="fa fa-users" aria-hidden="true"></i> </div>
                  <h4 style="color: white;">Partnerships </h4>
                  <h3 style="color: blue;"><?php echo $number2; ?></h3>
                </div>
              </div>
            </div>
          </div>
            
            
        </div>
      </div>
    </div>
  </div>
</div>

<!-- js section -->
<script src="../js/jquery.min.js"></script>

<!-- menu js -->
<script src="../js/menumaker.js"></script>
<!-- wow animation -->
<script src="../js/wow.js"></script>
<!-- custom js -->
<script src="../js/custom.js"></script>

</body>
</html>
