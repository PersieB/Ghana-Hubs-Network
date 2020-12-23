 <?php
 session_start();
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
        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
        <div class="menu_side">
          <div id="navbar_menu">
            <ul class="first-ul">
              <li> <a  href="../Hubs/viewHubs.php">Our Hubs</a></li>
              <li><a  href="../Events/viewEvents.php">Events</a>
            </li>
              <li><a class="active" href="contact.php">Contact</a></li>
            </ul>
          </div>
        </div>
        <!-- menu end -->
      </div>
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
              <h1 class="page-title">Reach out, <?php echo "@".$_SESSION["Username"]; ?></h1>
              <ol class="breadcrumb">
                <li><a>Contact</a></li>
                <li ><a href='logout.php'class="active">Logout </a></li>
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
                <div class="icon_bottom"> <i class="fa fa-linkedin-square" aria-hidden="true"></i> </div>
                <div class="info_cont">
                  <h4 style="color: white;">Follow us</h4>
                  <p><a style="color: blue;" href='https://www.linkedin.com'>Linkedin</a></p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 adress_cont margin_bottom_30">
              <div class="information_bottom left-side margin_bottom_20_all">
                <div class="icon_bottom"> <i class="fa fa-phone" aria-hidden="true"></i> </div>
                <div class="info_cont">
                  <h4 style="color: white;">Available 24/7</h4>
                  <p style="color: blue;">0011 234 56789</p>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 adress_cont margin_bottom_30">
              <div class="information_bottom left-side">
                <div class="icon_bottom"> <i class="fa fa-envelope" aria-hidden="true"></i> </div>
                <div class="info_cont">
                  <h4 style="color: white;">24/7 online support</h4>
                  <p><a style="color: blue;" href='mailto:persiebrown285@gmail.com'>Email</a></p>
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
