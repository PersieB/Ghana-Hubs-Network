<?php
session_start();

/* include relevant files */
include_once "../database/CRUD.php";
include_once "../database/hub_eventValidation.php"; 


$updateHub = new CRUD();   //CRUD object
$validation = new HubEventMeet();   // HubEventMeet object

if(isset($_POST['add'])){     // check if form posted
  /* get form data */
  $hubid = $_GET['HubID'];
  $hubName = trim($_POST['name']);
  $gmail = trim($_POST['email']);
  $telephone = trim($_POST['phone']);
  $address = trim($_POST['address']);
  $website = trim($_POST['link']);
  $description = trim($_POST['description']);
  $logo = $_FILES['image']['name'];

  /* Backend validation */
    $validateName = $validation->validateName($hubName);
    $validateMail = $validation->validateEmail($gmail);
    $validatePhone = $validation->validatePhone($telephone);
    $validateUrl = $validation->validateUrl($website);

    /* create errors */
    if(!$validateName){
      $nameError = true;
    }
    else if(!$validateMail){
      $emailError = true;
    }
    else if(!$validatePhone){
      $phoneError = true;
    }
    else if(!$validateUrl){
      $urlError = true;
    }
    else{   // no error
      $hub = $updateHub->selectParticularHub($hubid);   //select hub to update
      if($hub){   // update success
        $row = mysqli_fetch_array($hub);
        $image = $row['Logo_name'];   //get old image
        $path = "../hubLogos/".$image;   //get path
        unlink ($path);   //clear path
        $newHub = $updateHub->updateHub($hubid, $hubName, $address, $telephone, $gmail, $website, $description,$logo);  //update hub
        if($newHub){   // update success
          echo "<script> alert('MEMBER UPDATED!');
          window.location.href='viewHubs.php';</script>";
        }else{
          echo "<script> alert('UPDATE UNSUCCESSFUL!');
                </script>";
        }
      }
      
    }

}


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
<title>New Hub</title>
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
<!-- end zoom effect -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
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
        <?php include "../Chairperson/hubNavbar.html" ?>
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
                <li>New Hub</li>
                <li class="active"><a href="../Chairperson/logout.php">Logout</a></li>
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
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 contant_form">
              <div class="right"><button class="btn main_bt" onclick = "window.location.href='viewHubs.php'">Cancel</button></div>
              <div class="form_section">
              <?php 
              $update = true;
              include "hubForm.php" ?>
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
<script src="../js/bootstrap.min.js"></script>
<!-- menu js -->
<script src="../js/menumaker.js"></script>
<!-- wow animation -->
<script src="../js/wow.js"></script>
<!-- custom js -->
<script src="../js/custom.js"></script>
<script src="../js/hub_eventValidation.js"></script>

</body>
</html>
