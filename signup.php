<?php
include_once "database/userVerification.php";
       
$userSignup = new userVerification();  
 
if(isset($_POST['register'])){  
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $username = trim($_POST['username']);  
    $email = trim($_POST['email']); 
    $phone = trim($_POST['phone']); 
    $location = trim($_POST['location']);
    $password = trim($_POST['password']);  
    $confirmPassword = trim($_POST['confirm_password']);  

    $verifyPassword = $userSignup->validatePassword($password, $confirmPassword);
    if($verifyPassword){
      $validateFirstname = $userSignup->validateFirstname($firstname);
      $validateLastname = $userSignup->validateLastname($lastname);
      $validateUsername = $userSignup->validateUsername($username);
      $validateEmail = $userSignup->validateEmail($email);
      $validatePhone = $userSignup->validatePhone($phone);

      if(!$validateFirstname){
        $fnameError = true;
      }
      else if(!$validateLastname){
        $lnameError = true;
      }
      else if(!$validateUsername){
        $usernameError = true;
      }
      else if(!$validateEmail){
        $emailError = true;
      }
      else if(!$validatePhone){
        $phoneError = true;
      }

      $emailExists = $userSignup->isEmailExist($email);  
      $usernameExists = $userSignup->isUsernameExist($username);
      if($usernameExists){
        $oldUsername = true;
      }
      if($emailExists){
        $oldMail = true;
      }
      else{
          $register = $userSignup->UserRegister($firstname, $lastname, $username, $email, $phone, $location, $password);
          if($register){
            echo "<script> alert('SIGNUP SUCCESSFUL');
            window.location.href='login.php';</script>";
          }
          else{
            echo "<script> alert('SIGNUP NOT SUCCESSFUL');</script>";
          }
      }
        

    }else{
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
<link rel="icon" href="images/fevicon/fevicon.png" type="image/gif" />
<!-- bootstrap css -->
<link rel="stylesheet" href="css/bootstrap.min.css" />
<!-- Site css -->
<link rel="stylesheet" href="css/style.css" />
<!-- responsive css -->
<link rel="stylesheet" href="css/responsive.css" />
<!-- colors css -->
<link rel="stylesheet" href="css/colors1_dark.css" />
<!-- custom css -->
<link rel="stylesheet" href="css/custom.css" />
<!-- wow Animation css -->
<link rel="stylesheet" href="css/animate.css" />
<!-- zoom effect -->
<link rel='stylesheet' href='css/hizoom.css'>
<!-- end zoom effect -->

</head>
<body id="default_theme" class="contact_us">
<!-- loader -->
<div class="bg_load"> <img class="loader_animation" src="images/loaders/loader_1.png" alt="#" /> </div>
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
          <div class="logo"> <a href="it_home.html"><img src="images/logos/logo.JPG" alt="logo" /></a> </div>
          <!-- logo end -->
        </div>
        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
          <div class="menu_side">
            <div id="navbar_menu">
              <ul class="first-ul">
                <li> <a  href="index.html">Home</a>
                </li>
                <li><a href="about.html">About Us</a></li>
                <li> <a class="active" href="signup.php">Sign Up</a></li>           
                </li>
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
              <h1 class="page-title">My Account</h1>
              <ol class="breadcrumb">
                <li><a href="about.html">About</a></li>
                <li class="active">Sign up</li>
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
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 contant_form" id="signup">
            <h4>WE ARE BECAUSE YOU ARE</h4>
            <div><a class="btn main_bt" onclick = "window.location.href='login.php';" id="login_btn">Login</a></div>
            <div class="form_section">
              <form class="form_contant" method="POST">
                <fieldset>
                <div class="row">
                  <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <input class="field_custom" placeholder="First name" name = "firstname" value="<?php if(isset($firstname)){echo $firstname;} ?>"id="firstname" type="text" required
                     onblur = "validateFirstName(this)"/>
                     <?php if(isset($fnameError)){echo "<p style='color: rgb(199, 90, 90);';>Invalid firstname</p>";}?>
                     <p id="1" style="color: rgb(199, 90, 90);"></p>
                  </div>
                  <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <input class="field_custom" placeholder="Last name" name="lastname" value="<?php if(isset($lastname)){echo $lastname;} ?>" id="surname" type="text" required
                    onblur = "validateLastName(this)" />
                    <?php if(isset($lnameError)){echo "<p style='color: rgb(199, 90, 90);';>Invalid lastname</p>";}?>
                    <p id="2" style="color: rgb(199, 90, 90);"></p>
                  </div>
                  <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <input class="field_custom" placeholder="Username" name = "username" value="<?php if(isset($username)){echo $username;} ?>"id="username" type="text" required
                    onblur = "validateUserrName(this)" />
                    <?php if(isset($usernameError)){echo "<p style='color: rgb(199, 90, 90);';>Invalid username</p>";}?>
                    <?php if(isset($oldUsername)){
                      echo "<p style='color: rgb(199, 90, 90);';>Username exists</p>";}?>
                    <p id="3" style="color: rgb(199, 90, 90);"></p>
                  </div>
                  <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <input class="field_custom" placeholder="Gmail address" name = "email" id="email" value="<?php if(isset($email)){echo $email;} ?>"type="email" required
                    onblur = "validateEmail(this)" />
                    <?php if(isset($emailError)){echo "<p style='color: rgb(199, 90, 90);';>Invalid GMAIL</p>";}?>
                    <?php if(isset($oldMail)){echo "<p style='color: rgb(199, 90, 90);';>Mail exists</p>";}?>
                    <p id="4" style="color: rgb(199, 90, 90);"></p>
                  </div>
                  <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <input class="field_custom" placeholder="Phone number" name = "phone" id="phone" value="<?php if(isset($phone)){echo $phone;} ?>"type="text" required
                    onblur = "validatePhone(this)" />
                    <?php if(isset($phoneError)){echo "<p style='color: rgb(199, 90, 90);';>Invalid phone number</p>";}?>
                    <p id="5" style="color: rgb(199, 90, 90);"></p>
                  </div>
                  <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <input class="field_custom" placeholder="Location" name = "location" id="location" value="<?php if(isset($location)){echo $location;} ?>" type="text" required
                    onblur = "validateLocation(this)" />
                    <p id="6" style="color: rgb(199, 90, 90);"></p>
                  </div>
                  <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <input class="field_custom" placeholder="Password" id="password" name="password" type="password" required />
                  </div>
                  <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <input class="field_custom" placeholder="Confirm Password" name = "confirm_password" id="password1" type="password" required
                    onblur = "validatePassword()" />
                    <?php if(isset($passwordError)){echo "<p style='color: rgb(199, 90, 90);';>Paswords do not match</p>";}?>
                  </div>
                  <div class="center"><button class="btn main_bt" name="register" >Sign Up</button></div>
                </div>
                </fieldset>
              </form>
            </div>
            
            
        </div>
    </div>  
  </div>
</div>
<!-- js section -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- menu js -->
<script src="js/menumaker.js"></script>
<!-- wow animation -->
<script src="js/wow.js"></script>
<!-- custom js -->
<script src="js/custom.js"></script>
<script src="js/sign_up.js"></script>

</body>
</html>
