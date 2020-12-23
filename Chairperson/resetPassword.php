<?php
include_once "../database/userVerification.php";  //user verfication
       
$resetPassword = new userVerification();  

if(isset($_POST['reset'])){     //check if form is posted
  /* get form data */
    $username = trim($_POST['username']);  
    $password = trim($_POST['password0']);  
    $password1 = trim($_POST['password']);  
    $password2 = trim($_POST['password1']);  

    $reset = $resetPassword->validatePassword($password1, $password2);   //validate new password match backend
    if($reset){  
        $update = $resetPassword->resetPassword($username, $password, $password1);  //reset password
        if($update){  //if reset successful
            echo "<script> alert('RESET SUCCESSFUL');
            window.location.href='login.php';</script>";
        }
        else{
            $error = true;
        }
    }
    else{
        $passwordError = true;
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
<title>Login</title>
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
              <li> <a  href="../Hubs/viewHubs.php">Our Hubs</a>
                <ul>
                  <li><a href="../Hubs/viewHubs.php">Member Hubs</a></li>
                  <li><a href="../Hubs/addHub.php">New Member Hub</a></li>
                  <li><a href="../Hubs/editHubs.php">Edit Hubs' Profile</a></li>
                </ul>
              </li>
              <li><a href="../Events/viewEvents.php">Events</a>
                <ul>
                  <li><a href="../Events/viewEvents.php">Upcoming events</a></li>
                  <li><a href="../Events/addEventsForm.php">New Event</a></li>
                  <li><a href="../Events/editEvents.php">Edit Events</a></li>
                </ul>
              </li>
              <li><a class="active" href="resetPassword.php">Reset Password</a></li>
              <li><a href="../statistics/statistics.php">Statistics</a></li>
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
              <h1 class="page-title">Welcome <?php echo "@".$_SESSION["Username"]; ?></h1>
              <ol class="breadcrumb">
                <li>Reset Password</li>
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
  <div class="container" >
    <div class="row">
      <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12"></div>
      <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
        <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 contant_form" id="login">
              <div><a class="btn main_bt" onclick = "window.location.href='../Hubs/viewHubs.php';">Cancel</a></div>
              <div class="form_section">
                <form class="form_contant" method="POST">
                  <fieldset>
                  <?php if(isset($error)){echo "<p style='color: rgb(199, 90, 90);';>Username and/ Password does not exist.</p>";}?>
                  <div class="row">
                    <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <input class="field_custom" placeholder="Username" name="username" type="text" required />
                    </div>
                    <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <input class="field_custom" placeholder="Old Password" name = "password0" type="password" required />
                    </div>
                    <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <input class="field_custom" placeholder="New Password" name = "password" id="password" type="password" required />
                    </div>
                    <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <input class="field_custom" placeholder="Confirm Password" name = "password1" id="password1" type="password"
                      onblur = "validatePassword()" required />
                      <?php if(isset($passwordError)){echo "<p style='color: rgb(199, 90, 90);';>Paswords do not match</p>";}?>
                    </div>
                    <div class="center"><button class="btn main_bt" name="reset" >Reset</button></div>
                  </div>
                  </fieldset>
                </form>
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
<script src="../js/sign_up.js"></script>

</body>
</html>
